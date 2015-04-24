package br.edu.unilab.unicafe.main;

import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;

import br.edu.unilab.unicafe.dao.DAO;
import br.edu.unilab.unicafe.model.Administrador;
import br.edu.unilab.unicafe.model.Maquina;

public class MainAdmin {

	
	public static void main(String[] args) {
		//Vamos usar essa função para ativar backup do banco de dados. 
		
		//Vamos salvar tabela 
		//usuario(id_usuario, nome, email, login, senha, nivel_acesso, cpf)
		//maquina(id_maquina, nome, endereco_mac)
		//acesso(id_acesso, id_usuario, id_maquina, hora_acesso, tempo_usado, tempo_oferecido, ip)
		
		DAO conexaoSqlite = new DAO(DAO.TIPO_SQLITE);
	//	DAO conexaoPostgres = new DAO(DAO.TIPO_POSTGRESQL);
		
		//Vamos começar com a tabela de máquinas, que é mais simples. 
		
		
		PreparedStatement ps;
		try {
			ps = conexaoSqlite.getConexao().prepareStatement("SELECT * FROM maquina");
			ResultSet resultSet = ps.executeQuery();
			while(resultSet.next()){

				System.out.println(resultSet.getString("nome_maq"));
				
			}
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		
		
		
		
		
	}
}
