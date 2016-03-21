package br.edu.unilab.unicafe.main;

import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.Scanner;



import br.edu.unilab.unicafe.dao.DAO;
import br.edu.unilab.unicafe.model.Usuario;

public class MainExportador {
	public static final int COMANDO_EXPORTAR = 1;
	public static final int COMANDO_IMPORTAR = 2;
	
	
	public static void main(String[] args) {
			
		Scanner scanner = new Scanner(System.in);
		int comando;
		System.out.println("Digite "+COMANDO_EXPORTAR+" para exportar e "+COMANDO_IMPORTAR+" exportar. Após a operação o programa será encerrado:");
		comando = scanner.nextInt();
		switch (comando) {
		case COMANDO_EXPORTAR:
			criarTabela();
			exportar();
			break;
		case COMANDO_IMPORTAR:
			System.out.println("Iniciando Importacao.");
			importar();
			break;
		default:
			System.out.println("Comando nao localizado");
			break;
		}
		
	}
	public static void criarTabela(){
		
		System.out.println("Iniciando exportacao.");
		DAO dao = new DAO(DAO.TIPO_SQLITE);
		try {
			Statement stmt = dao.getConexao().createStatement();
			
			String sql = "CREATE TABLE usuario ("+
					"id	INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,"+
					"id_externo	INTEGER NOT NULL UNIQUE,"+
					"nome	TEXT,"+
					"email	TEXT,"+
					"login	TEXT,"+
					"senha	TEXT"+
				")";
			stmt.executeUpdate(sql);
			stmt.close();
			
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		
		
	}
	public static void importar(){
		DAO daoSqlite = new DAO(DAO.TIPO_SQLITE);
		DAO daoProducao = new DAO(DAO.TIPO_PG_PRODUCAO);
		
		PreparedStatement ps;
		try {
			ps = daoSqlite.getConexao().prepareStatement("SELECT * FROM usuario");
			ResultSet resultSet = ps.executeQuery();
			while(resultSet.next()){
				
				int idBaseExterna = resultSet.getInt("id_externo");
				String nome = resultSet.getString("nome");
				String email = resultSet.getString("email");
				String login = resultSet.getString("login");
				String senha = resultSet.getString("senha");
				
				System.out.println("Importando: "+nome);
				String sqlInserir = "INSERT into usuarios_unicafe(id_usuario, nome, email, login, senha) "
						+ "VALUES(?, ?, ?, ?, ?)";
				PreparedStatement ps2 = daoProducao.getConexao().prepareStatement(sqlInserir);
				
				ps2.setInt(1, idBaseExterna);
				ps2.setString(2, nome);
				ps2.setString(3, email);
				ps2.setString(4, login);
				ps2.setString(5, senha);
				ps2.executeUpdate();
				System.out.println(nome+" importado!");
				
				
			}
			daoProducao.getConexao().close();
			daoSqlite.getConexao().close();
			
		} catch (SQLException e) {
			System.out.println("Errou!");
			
			e.printStackTrace();
		}
		
	}

	public static void exportar(){
		DAO daoPgSigaa = new DAO(DAO.TIPO_PG_SIGAA);
		DAO daoSqlite = new DAO(DAO.TIPO_SQLITE);
		
		PreparedStatement ps;
		
		try {
			
			ps = daoPgSigaa.getConexao().prepareStatement("SELECT * FROM usuarios_unicafe");
			ResultSet resultSet = ps.executeQuery();
			while(resultSet.next()){
				
				int idBaseExterna = resultSet.getInt("id_usuario");
				String nome = resultSet.getString("nome");
				String email = resultSet.getString("email");
				String login = resultSet.getString("login");
				String senha = resultSet.getString("senha");
				
				System.out.println("Exportando "+nome);
				
				String sqlInserir = "INSERT into usuario(id_externo, nome, email, login, senha) "
						+ "VALUES(?, ?, ?, ?, ?)";
				
				PreparedStatement ps2 = daoSqlite.getConexao().prepareStatement(sqlInserir);
				
				ps2.setInt(1, idBaseExterna);
				ps2.setString(2, nome);
				ps2.setString(3, email);
				ps2.setString(4, login);
				ps2.setString(5, senha);
				ps2.executeUpdate();
				System.out.println(nome+" Exportado!!");
			}
			
			daoSqlite.getConexao().close();
			System.out.println("Sucesso");
			
		} catch (SQLException e) {
			System.out.println("Minha nossa senhora. O que foi que aconteceu?");
			e.printStackTrace();
		}
	
		
	}
}
