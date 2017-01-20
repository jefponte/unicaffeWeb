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
	
	private int tipoDeConexao;
	public void setTipoDeConexao(int tipoDeConexao){
		this.tipoDeConexao = tipoDeConexao;
	}
	
	public DAO(int tipoDeConexao) {
		this.tipoDeConexao = tipoDeConexao;
		novaConexao();
	}

	public DAO() {
		this.tipoDeConexao = TIPO_CONEXAO_DEFAULT;
		novaConexao();
	}

	public DAO(Connection conexao) {
		this.conexao = conexao;
	}

	public void novaConexao(){
		this.conexao = null;
		try {
			switch (tipoDeConexao) {
			case TIPO_POSTGRESQL:
				Class.forName(DRIVER_POSTGRES);
				this.conexao = DriverManager.getConnection(JDBC_BANCO_POSTGRES+ "//" + HOST_POSTGRES + "/" + BANCO_POSTGRES,USUARIO_POSTGRES, SENHA_POSTGRES);
				break;
			case TIPO_PG_PRODUCAO:
				Class.forName(DRIVER_POSTGRES);
				this.conexao = DriverManager.getConnection(JDBC_BANCO_POSTGRES+ "//" + HOST_PG_PRODUCAO + "/" + BANCO_PG_PRODUCAO,USUARIO_PG_PRODUCAO, SENHA_PG_PRODUCAO);
				break;
			case TIPO_PG_SIGAA:
				Class.forName(DRIVER_POSTGRES);
				this.conexao = DriverManager.getConnection(JDBC_BANCO_POSTGRES+ "//" + HOST_PG_SIGAA + "/" + BANCO_PG_SIGAA,USUARIO_PG_SIGAA, SENHA_PG_SIGAA);
				break;
			case TIPO_PG_TESTE:
				Class.forName(DRIVER_POSTGRES);
				this.conexao = DriverManager.getConnection(JDBC_BANCO_POSTGRES+ "//" + HOST_PG_TESTE+ "/" + BANCO_PG_TESTE,USUARIO_PG_TESTE, SENHA_PG_TESTE);
				break;
			case TIPO_PG_SIMULACAO_SIGAA:
				Class.forName(DRIVER_POSTGRES);
				this.conexao = DriverManager.getConnection(JDBC_BANCO_POSTGRES+ "//" + HOST_PG_SIMULACAO_SIGAA+ "/" + BANCO_PG_SIMULACAO_SIGAA,USUARIO_PG_SIMULACAO_SIGAA, SENHA_PG_SIMULACAO_SIGAA);
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
				break;
			}
		} catch (ClassNotFoundException e1) {
			e1.printStackTrace();
		} catch (SQLException e) {
			e.printStackTrace();
		}
	}
	
	private Connection conexao;

	public Connection getConexao() {
		return conexao;
	}

	public void setConexao(Connection conexao) {
		this.conexao = conexao;
	}

	

	public static final String USUARIO_POSTGRES = "postgres";
	public static final String USUARIO_PG_SIGAA = "unicafe";
	public  static final String USUARIO_PG_TESTE = "unicafe";
	public  static final String SENHA_PG_SIGAA = "unicafe";
	public  static final String SENHA_PG_SIMULACAO_SIGAA = "unicafe@unilab";
	public static final String USUARIO_PG_SIMULACAO_SIGAA = "unicafe";
	public static final String USUARIO_PG_PRODUCAO = "unicafe";
	public  static final String HOST_POSTGRES = "localhost:5432";
	public  static final String HOST_PG_PRODUCAO = "localhost:5432";
	public  static final String HOST_PG_SIGAA = "200.129.19.80";
	public  static final String HOST_PG_TESTE = "10.5.1.8";
	public  static final String HOST_PG_SIMULACAO_SIGAA = "10.5.1.8:5432";
	
	public  static final String BANCO_PG_SIGAA = "sistemas_comum";
	public  static final String BANCO_PG_TESTE = "unicafe";
	public  static final String BANCO_PG_SIMULACAO_SIGAA = "sistemas_comum";
	public  static final String BANCO_PG_PRODUCAO = "unicafe";
	
	public  static final String SENHA_POSTGRES = "cti@unilab2012";
	public  static final String SENHA_PG_PRODUCAO = "unicafe";
	public  static final String SENHA_PG_TESTE= "unicafe@unilab";

	public  static final String BANCO_POSTGRES = "unicafe";
	public  static final String DRIVER_POSTGRES = "org.postgresql.Driver";
	public  static final String JDBC_BANCO_POSTGRES = "jdbc:postgresql:";

	public static final String DRIVER_SQLITE = "org.sqlite.JDBC";
	public static final String JDBC_BANCO_SQLITE = "jdbc:sqlite:banco.db";

	
	public static final String USUARIO_MYSQL = "root";
	public static final String SENHA_MYSQL = "cocacola@12";
	public static final String IP_MYSQL = "127.0.0.1";
	public static final String BANCO_MYSQL = "banco_sigaa";
	public static final String DRIVER_MYSQL = "com.mysql.jdbc.Driver";
	public static final String JDBC_BANCO_MYSQL = "jdbc:mysql:";
	
	
	
	public static final int TIPO_SQLITE = 0;
	public static final int TIPO_MYSQL = 1;
	public static final int TIPO_POSTGRESQL = 2;
	public static final int TIPO_PG_SIGAA = 4;
	public static final int TIPO_PG_TESTE = 5;
	public static final int TIPO_PG_SIMULACAO_SIGAA = 6;
	
	public static final int TIPO_PG_PRODUCAO = 7;
	
	public static final int TIPO_CONEXAO_DEFAULT = TIPO_PG_PRODUCAO;
	public static final int TIPO_CONEXAO_AUTENTICACAO = TIPO_PG_SIGAA;
	
	

}
