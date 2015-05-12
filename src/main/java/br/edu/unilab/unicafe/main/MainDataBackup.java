package br.edu.unilab.unicafe.main;

import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Time;
import java.sql.Timestamp;
import java.text.ParseException;
import java.text.SimpleDateFormat;
import java.util.ArrayList;
import java.util.Date;

import br.edu.unilab.unicafe.dao.DAO;
import br.edu.unilab.unicafe.model.Acesso;
import br.edu.unilab.unicafe.model.Maquina;
import br.edu.unilab.unicafe.model.Usuario;

public class MainDataBackup {

	public static void main(String[] args) {

		
		
		
		// Pegar a lista de usuários do SQLITE
		ArrayList<Usuario> listaDeUsuarios = new ArrayList<Usuario>();
		ArrayList<Maquina> listaDeMaquinas = new ArrayList<Maquina>();
		ArrayList<Acesso> listaDeAcessos = new ArrayList<Acesso>();
		
		DAO daoPostgres = new DAO(DAO.TIPO_POSTGRESQL);
		DAO daoPostgres2 = new DAO(DAO.TIPO_POSTGRESQL2);
		PreparedStatement ps;

		try {
			ps = daoPostgres.getConexao().prepareStatement(
					"SELECT * FROM usuario");
			ResultSet resultSet = ps.executeQuery();
			while (resultSet.next()) {
				Usuario usuario = new Usuario();
				usuario.setId(resultSet.getInt("id_usuario"));
				usuario.setNome(resultSet.getString("nome"));
				usuario.setEmail(resultSet.getString("email"));
				usuario.setLogin(resultSet.getString("login"));
				usuario.setSenha(resultSet.getString("senha"));
				usuario.setNivelAcesso(resultSet.getInt("nivel_acesso"));
				usuario.setCpf(resultSet.getString("cpf"));
				listaDeUsuarios.add(usuario);
			}

			// Agora vou pegar a lista de máquinas.

			ps = daoPostgres.getConexao().prepareStatement(
					"SELECT * FROM maquina");
			resultSet = ps.executeQuery();
			while (resultSet.next()) {
				Maquina maquina = new Maquina();
				maquina.setId(resultSet.getInt("id_maquina"));
				maquina.setNome(resultSet.getString("nome"));
				maquina.setEnderecoMac(resultSet.getString("mac"));
				listaDeMaquinas.add(maquina);
			}

			//Criar tabelas no banco. 
		//	PreparedStatement psCriarLaboratorio = daoPostgres2.getConexao().prepareStatement("CREATE TABLE laboratorio(  id_laboratorio serial NOT NULL,  nome character varying(500),  CONSTRAINT laboratorio_pkey PRIMARY KEY (id_laboratorio))WITH (  OIDS=FALSE);");			
		//	psCriarLaboratorio.executeUpdate();
			
//			PreparedStatement psCriarMaquina = daoPostgres.getConexao().prepareStatement("CREATE TABLE maquina(  id_maquina serial NOT NULL,  nome character varying(500),  mac character varying(500),  id_laboratorio integer,  CONSTRAINT maquina_pkey PRIMARY KEY (id_maquina),  CONSTRAINT maquina_id_laboratorio_fkey FOREIGN KEY (id_laboratorio)      REFERENCES laboratorio (id_laboratorio) MATCH SIMPLE      ON UPDATE NO ACTION ON DELETE NO ACTION)WITH (  OIDS=FALSE);");			
//			psCriarMaquina.executeUpdate();

//			PreparedStatement psCriarUsuario = daoPostgres.getConexao().prepareStatement("CREATE TABLE usuario(  id_usuario serial NOT NULL,  nome character varying(500),  email character varying(500),  login character varying(500),  senha character varying(500),  nivel_acesso integer,  cpf character varying(500),  CONSTRAINT usuario_pkey PRIMARY KEY (id_usuario))WITH (  OIDS=FALSE);");			
//			psCriarUsuario.executeUpdate();
			
			
//			PreparedStatement psCriarAcesso = daoPostgres.getConexao().prepareStatement("CREATE TABLE acesso(  id_acesso serial NOT NULL,  id_usuario integer,  id_maquina integer,  hora_acesso timestamp without time zone,  tempo_usado integer,  tempo_oferecido integer,  ip character varying(500),  CONSTRAINT acesso_pkey PRIMARY KEY (id_acesso),  CONSTRAINT acesso_id_maquina_fkey FOREIGN KEY (id_maquina)      REFERENCES maquina (id_maquina) MATCH SIMPLE      ON UPDATE NO ACTION ON DELETE NO ACTION)WITH (  OIDS=FALSE);");			
//			psCriarAcesso.executeUpdate();
			
			
			
			
			
			//Cadastra laboratorio de liberdade. 
			
			PreparedStatement psInserir = daoPostgres2.getConexao().prepareStatement("INSERT into laboratorio(id_laboratorio, nome) VALUES(?, ?)");			
			psInserir.setInt(1, 1);
			psInserir.setString(2, "LABTI01");
			psInserir.executeUpdate();
			

			//Cadastra maquinas nesse laboratorio. 
			
			for(Maquina maquina: listaDeMaquinas){
				PreparedStatement psMaquinas = daoPostgres2.getConexao().prepareStatement("INSERT into maquina(id_maquina, nome, mac, id_laboratorio) VALUES(?, ?, ?, ?)");
				psMaquinas.setInt(1, maquina.getId());
				psMaquinas.setString(2, maquina.getNome());
				psMaquinas.setString(3, maquina.getEnderecoMac());
				psMaquinas.setInt(4, maquina.getLaboratorio().getId());
				psMaquinas.executeUpdate();
				
			}
			
			
			
			
			
			//cadastra usuarios 
			
			for(Usuario u : listaDeUsuarios){
				PreparedStatement psUsuarios = daoPostgres2.getConexao().prepareStatement("INSERT into usuario(id_usuario, nome, email, login, senha, nivel_acesso, cpf) VALUES(?, ?, ?, ?, ?, ?, ?)");
				psUsuarios.setInt(1, u.getId());
				psUsuarios.setString(2, u.getNome());
				psUsuarios.setString(3, u.getEmail());
				psUsuarios.setString(4, u.getLogin());
				psUsuarios.setString(5, u.getSenha());
				psUsuarios.setInt(6, 1);
				psUsuarios.setString(7, u.getCpf());
				psUsuarios.executeUpdate();
				System.out.println(u.getNome());
			}
			
			//cadastra os acessos
			
			
			
			for(Acesso acesso : listaDeAcessos){
				PreparedStatement psAcessos = daoPostgres.getConexao().prepareStatement("INSERT into acesso(id_acesso, id_usuario, id_maquina, hora_acesso, tempo_usado, tempo_oferecido, ip) VALUES(?, ?, ?, ?, ?, ?, ?)");
				psAcessos.setInt(1, acesso.getId());
				psAcessos.setInt(2, acesso.getUsuario().getId());
				psAcessos.setInt(3, acesso.getIdMaquina());
				psAcessos.setTimestamp(4, new Timestamp(acesso.getHoraInicial()));
				psAcessos.setInt(5, acesso.getTempoUsado());
				psAcessos.setInt(6, acesso.getTempoDisponibilizado());
				psAcessos.setString(7, acesso.getIp());
				psAcessos.executeUpdate();
			}
			

		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}

	}

}
