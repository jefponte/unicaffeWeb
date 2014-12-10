package br.edu.unilab.unicafe.dao;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;

public class DAO {

	/*
	 *Acesso ao postgresql 
	 */
	private static final String USUARIO = "postgres";
	private static final String SENHA = "cti@unilab2012";
	private static final String IP = "dti13.net.unilab.edu.br:5432";
	private static final String BANCO = "unicafe";
	private static final String DRIVER = "org.postgresql.Driver";
	private static final String JDBC_BANCO = "jdbc:postgresql:";

	
	/*
	 * try {
			Class.forName("org.sqlite.JDBC");
			this.conexao = DriverManager.getConnection("jdbc:sqlite:banco.db");
		} catch (ClassNotFoundException e1) {
			e1.printStackTrace();
		} catch (SQLException e) {
			e.printStackTrace();
		}
	 * 
	 */
	
	
	
	/*
	 * 
	
	
		Connection conexao = null;
		try {
			// carregar driver
			Class.forName(DRIVER);
			if (conexao == null || conexao.isClosed()) {
				conexao = DriverManager.getConnection(JDBC_BANCO + "//" + IP
						+ "/" + BANCO, USUARIO, SENHA);
				this.conexao = conexao;
			}

		} catch (ClassNotFoundException e) {
			System.out.println("Conector Invalido");
			e.printStackTrace();
		} catch (SQLException e) {
			System.out.println("Erro na conexao");
			e.printStackTrace();
		}


	 */
	
	public DAO() {
/*		*/
		  try {
				Class.forName("org.sqlite.JDBC");
				this.conexao = DriverManager.getConnection("jdbc:sqlite:banco.db");
			} catch (ClassNotFoundException e1) {
				e1.printStackTrace();
			} catch (SQLException e) {
				e.printStackTrace();
			}

		
/*
		Connection conexao = null;
		try {
			// carregar driver
			Class.forName(DRIVER);
			if (conexao == null || conexao.isClosed()) {
				conexao = DriverManager.getConnection(JDBC_BANCO + "//" + IP
						+ "/" + BANCO, USUARIO, SENHA);
				this.conexao = conexao;
			}

		} catch (ClassNotFoundException e) {
			System.out.println("Conector Invalido");
			e.printStackTrace();
		} catch (SQLException e) {
			System.out.println("Erro na conexao");
			e.printStackTrace();
		}
*/
		  
	}


	public DAO(Connection conexao) {
		this.conexao = conexao;
	}

	private Connection conexao;

	public Connection getConexao() {
		return conexao;
	}

	public void setConexao(Connection conexao) {
		this.conexao = conexao;
	}

}
