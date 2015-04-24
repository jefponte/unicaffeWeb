package br.edu.unilab.unicafe.dao;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;

/**
 * 
 * @author Jefferson
 *
 */
public class DAO {

	/*
	 * Acesso ao postgresql
	 */

	private static final String USUARIO_POSTGRES = "postgres";
	private static final String SENHA_POSTGRES = "cti@unilab2012";
	private static final String IP_POSTGRES = "localhost:5432";
	private static final String BANCO_POSTGRES = "unicafe";
	private static final String DRIVER_POSTGRES = "org.postgresql.Driver";
	private static final String JDBC_BANCO_POSTGRES = "jdbc:postgresql:";

	public static final String DRIVER_SQLITE = "org.sqlite.JDBC";
	public static final String JDBC_BANCO_SQLITE = "jdbc:sqlite:banco.db";

	
	private static final String USUARIO_MYSQL = "root";
	private static final String SENHA_MYSQL = "cocacola@12";
	private static final String IP_MYSQL = "127.0.0.1";
	private static final String BANCO_MYSQL = "banco_sigaa";
	private static final String DRIVER_MYSQL = "com.mysql.jdbc.Driver";
	private static final String JDBC_BANCO_MYSQL = "jdbc:mysql:";

	
	
	public static final int TIPO_SQLITE = 0;
	public static final int TIPO_MYSQL = 1;
	public static final int TIPO_POSTGRESQL = 2;
	private int tipoDeConexao;

	public int getTipoDeConexao(){
		return this.tipoDeConexao;
	}
	public DAO(int tipoDeConexao) {
		this.tipoDeConexao = tipoDeConexao;
		try {
			switch (this.tipoDeConexao) {
			case TIPO_POSTGRESQL:
				Class.forName(DRIVER_POSTGRES);
				this.conexao = DriverManager.getConnection(JDBC_BANCO_POSTGRES+ "//" + IP_POSTGRES + "/" + BANCO_POSTGRES,USUARIO_POSTGRES, SENHA_POSTGRES);
				break;
			case TIPO_MYSQL:
				Class.forName(DRIVER_MYSQL);
				this.conexao=DriverManager.getConnection(JDBC_BANCO_MYSQL+"//"+IP_MYSQL+"/"+BANCO_MYSQL,USUARIO_MYSQL,SENHA_MYSQL);
				break;
			case TIPO_SQLITE:
				Class.forName(DRIVER_SQLITE);
				this.conexao = DriverManager.getConnection(JDBC_BANCO_SQLITE);
				break;
			default:
				Class.forName(DRIVER_POSTGRES);
				this.conexao = DriverManager.getConnection(JDBC_BANCO_SQLITE);
				System.out.println("PAssei por aqui.");
				break;
			}
		} catch (ClassNotFoundException e1) {
			e1.printStackTrace();
		} catch (SQLException e) {
			e.printStackTrace();
		}

	}

	public DAO() {
		this.tipoDeConexao = TIPO_POSTGRESQL;
		try {
			switch (this.tipoDeConexao) {
			case TIPO_POSTGRESQL:
				Class.forName(DRIVER_POSTGRES);
				this.conexao = DriverManager.getConnection(JDBC_BANCO_POSTGRES+ "//" + IP_POSTGRES + "/" + BANCO_POSTGRES,USUARIO_POSTGRES, SENHA_POSTGRES);
				break;
			case TIPO_MYSQL:
				Class.forName(DRIVER_MYSQL);
				this.conexao=DriverManager.getConnection(JDBC_BANCO_MYSQL+"//"+IP_MYSQL+"/"+BANCO_MYSQL,USUARIO_MYSQL,SENHA_MYSQL);
				break;
			case TIPO_SQLITE:
				Class.forName(DRIVER_SQLITE);
				this.conexao = DriverManager.getConnection(JDBC_BANCO_SQLITE);
				break;
			default:
				Class.forName(DRIVER_SQLITE);
				this.conexao = DriverManager.getConnection(JDBC_BANCO_SQLITE);
				System.out.println("PAssei por aqui.");
				break;
			}
		} catch (ClassNotFoundException e1) {
			e1.printStackTrace();
		} catch (SQLException e) {
			e.printStackTrace();
		}

		
		/*
		try {

			Class.forName(DRIVER_SQLITE);
			this.conexao = DriverManager.getConnection(JDBC_BANCO_SQLITE);
		} catch (ClassNotFoundException e1) {
			e1.printStackTrace();
		} catch (SQLException e) {
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
