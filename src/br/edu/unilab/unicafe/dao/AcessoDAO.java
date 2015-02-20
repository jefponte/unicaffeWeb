package br.edu.unilab.unicafe.dao;

import java.security.Timestamp;
import java.sql.Connection;
import java.sql.Date;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Time;
import java.text.DateFormat;
import java.text.ParseException;
import java.text.SimpleDateFormat;
import java.util.ArrayList;
import java.util.Locale;

import br.edu.unilab.unicafe.model.Acesso;
import br.edu.unilab.unicafe.model.Cliente;
import br.edu.unilab.unicafe.model.Maquina;
import br.edu.unilab.unicafe.model.Usuario;

public class AcessoDAO extends DAO {

	public static final int COTA = 3600;

	public AcessoDAO() {
		super();
	}

	public AcessoDAO(Connection conexao) {
		super(conexao);
	}

	public AcessoDAO(int tipoDeConexao) {
		super(tipoDeConexao);

	}

	/**
	 * Retorna toda a lista de acssos.
	 * 
	 * @return
	 */
	public ArrayList<Acesso> retornaLista() {

		ArrayList<Acesso> lista = new ArrayList<Acesso>();

		PreparedStatement ps;
		try {
			ps = this.getConexao().prepareStatement("SELECT acesso.ip, usuario.login,  acesso.id_maquina, acesso.id_usuario, maquina.nome_maq, acesso.hora_acesso, acesso.tempo_usado, acesso.tempo_oferecido FROM acesso INNER JOIN usuario ON acesso.id_usuario = usuario.id_usuario INNER JOIN maquina ON acesso.id_maquina = maquina.id_maquina;");
			// ps.setInt(1, usuario.getId());
			ResultSet resultSet = ps.executeQuery();
			while (resultSet.next()) {
				Acesso acesso = new Acesso();
				acesso.setTempoUsado(resultSet.getInt("tempo_usado"));
				acesso.setTempoDisponibilizado(resultSet
						.getInt("tempo_oferecido"));
				Maquina maquina = new Maquina();
				maquina.setId(resultSet.getInt("id_maquina"));
				maquina.setIp(resultSet.getString("ip"));
				maquina.setNome(resultSet.getString("nome_maq"));
				
				String input = resultSet.getString("hora_acesso");

				

				
				
				
				try {							//"yyyy-MM-dd HH:mm:ss"
					SimpleDateFormat f = new SimpleDateFormat("yyyy-MM-dd HH:mm:ss");
					java.util.Date d = f.parse(input);
					long milliseconds = d.getTime();
					acesso.setHoraInicial(milliseconds);
					
				} catch (ParseException e) {
					// TODO Auto-generated catch block
					e.printStackTrace();
				}

				acesso.setMaquina(maquina);
				Usuario usuario = new Usuario();
				usuario.setId(resultSet.getInt("id_usuario"));
				usuario.setLogin(resultSet.getString("login"));
				
				acesso.setUsuario(usuario);
				

				lista.add(acesso);
			}
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}

		return lista;

	}

	/**
	 * Retorna todos os acessos de um usuário.
	 * 
	 * @param usuario
	 * @return
	 */
	public ArrayList<Acesso> retornaLista(Usuario usuario) {

		ArrayList<Acesso> lista = new ArrayList<Acesso>();

		PreparedStatement ps;
		try {
			ps = this.getConexao().prepareStatement(
					"SELECT * FROM acesso WHERE id_usuario = ?");
			ps.setInt(1, usuario.getId());
			ResultSet resultSet = ps.executeQuery();
			while (resultSet.next()) {
				Acesso acesso = new Acesso();
				acesso.setTempoUsado(resultSet.getInt("tempo_usado"));
				lista.add(acesso);
			}
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}

		return lista;

	}

	public int retornaTempoUsado(Usuario usuario) {
		int tempo = 0;
		for (Acesso acesso : this.retornaLista(usuario)) {
			tempo += acesso.getTempoUsado();
		}
		return tempo;
	}

	/**
	 * Retorna true se a máquina for cadastrada com sucesso.
	 * 
	 * @param maquina
	 * @return
	 */

	public boolean cadastra(Acesso acesso) {
		try {

			PreparedStatement ps2 = this
					.getConexao()
					.prepareStatement(
							"INSERT into acesso(id_usuario, tempo_usado, hora_acesso, id_maquina, tempo_oferecido, ip) VALUES(?, ?, ?, ?, ?, ?)");
			ps2.setInt(1, acesso.getUsuario().getId());
			ps2.setInt(2, acesso.getTempoUsado());
			Date data = new Date(System.currentTimeMillis());
			SimpleDateFormat formatarDate = new SimpleDateFormat(
					"yyyy-MM-dd HH:mm:ss");
			String strData = formatarDate.format(data);
			ps2.setString(3, strData);
			ps2.setInt(4, acesso.getMaquina().getId());
			ps2.setInt(5, acesso.getTempoDisponibilizado());
			ps2.setString(6, acesso.getCliente().getConexao().getInetAddress().toString().substring(1));
			ps2.executeUpdate();
			
			
			return true;

		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
			return false;
		}
	}

	/**
	 * Esse método pega um acesso padrão do sistema e envia pra tabela do banco
	 * do felipe. O banco de dados que tá lá no PC do felipe.
	 * 
	 * @param acesso
	 */
	public void cadastraTabelaFelipe(Acesso acesso) {
		
		Connection conexaoPostgres;
		Connection conexaoSqlite;
		if (this.getTipoDeConexao() == TIPO_POSTGRESQL) {
			conexaoSqlite = new DAO(TIPO_SQLITE).getConexao();
			conexaoPostgres = this.getConexao();
		} else if (this.getTipoDeConexao() == TIPO_SQLITE) {
			conexaoPostgres = new DAO(TIPO_POSTGRESQL).getConexao();
			conexaoSqlite = this.getConexao();
		} else {
			conexaoPostgres = new DAO(TIPO_POSTGRESQL).getConexao();
			conexaoSqlite = new DAO(TIPO_SQLITE).getConexao();
		}

		System.out.println(acesso.getMaquina().getNome());
		//Se a máquina não existe lá, cadastre-a
		
		try {
			PreparedStatement ps = conexaoPostgres.prepareStatement("SELECT * FROM maquina WHERE nome_maq = ? LIMIT 1");
			ps.setString(1, acesso.getMaquina().getNome());
			ResultSet resultSet = ps.executeQuery();
			while(resultSet.next()){
				acesso.getMaquina().setId(resultSet.getInt("id_maquina"));
				PreparedStatement ps2 = conexaoPostgres.prepareStatement("SELECT * FROM usuario WHERE login = ? LIMIT 1");
				ps2.setString(1, acesso.getUsuario().getLogin());
				
				ResultSet resultSet2 = ps2.executeQuery();
				while(resultSet2.next()){
					acesso.getUsuario().setId(resultSet2.getInt("id_usuario"));
					
					PreparedStatement ps3 = conexaoPostgres.prepareStatement("INSERT INTO historico_acesso(id_usuario, id_maquina, data_inicio_uso, data_termino_uso, ipv4) VALUES(?, ?, ?, ?, ?)");
					ps3.setInt(1, acesso.getUsuario().getId());
					ps3.setInt(2, acesso.getMaquina().getId());
					ps3.setTimestamp(3, new java.sql.Timestamp(acesso.getHoraInicial()));
					ps3.setTimestamp(4, new java.sql.Timestamp((acesso.getHoraInicial()+acesso.getTempoUsado())));
					ps3.setString(5, acesso.getMaquina().getIp());
					
					ps3.executeUpdate();
					System.out.println("Cadastrou acesso. ");
					return;
					
					
				}
				//chega aqui se não existir usuário com esse login. 
				//Iremos cadastrar nada. 
				//Só usupários cadastrados no banco terão acesso registrado por enquanto. 
				return;
				
			}
			//chega aqui se não existir maquina. 
			PreparedStatement ps4 = conexaoPostgres.prepareStatement("INSERT INTO maquina(nome_maq) VALUES(?)");
			ps4.setString(1, acesso.getMaquina().getNome());
			ps4.executeUpdate();
			System.out.println("Cadastrou maquina. ");
			cadastraTabelaFelipe(acesso);
			

		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		
	
		
				
	}

	public void renovaGalera() {

		PreparedStatement ps2;
		try {
			for (Acesso acesso : retornaLista()) {
				cadastraTabelaFelipe(acesso);
			}
			ps2 = this.getConexao().prepareStatement("DELETE FROM acesso");
			ps2.executeUpdate();
			System.out.println("Galera foi renovada. ");
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}


	}

}
