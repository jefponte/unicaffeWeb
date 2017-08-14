package br.edu.unilab.unicafe.dao;

import java.io.FileInputStream;
import java.io.FileNotFoundException;
import java.io.IOException;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;
import java.util.Properties;

/**
 * 
 * @author Jefferson
 *
 */
public class DAO {

	private int tipoDeConexao;
	private String sgdb;
	private String entidade;
	private Connection conexao;

	public DAO(int tipoDeConexao) {
		this.tipoDeConexao = tipoDeConexao;
		fazerConexao();
	}

	public DAO() {
		this.tipoDeConexao = TIPO_DEFAULT;
		fazerConexao();
	}

	public DAO(Connection conexao) {
		this.conexao = conexao;
	}

	public void fazerConexao() {
		this.conexao = null;
		try {
			Properties config = new Properties();
			FileInputStream file;
			file = new FileInputStream(ARQUIVO_CONFIGURACAO);
			config.load(file);
			String sgdb, host, porta, bdNome, usuario, senha;
			switch (tipoDeConexao) {
			case TIPO_USUARIOS:
				sgdb = config.getProperty("usuarios_sgdb");
				host = config.getProperty("usuarios_host");
				porta = config.getProperty("usuarios_porta");
				bdNome = config.getProperty("usuarios_bd_nome");
				usuario = config.getProperty("usuarios_usuario");
				senha = config.getProperty("usuarios_senha");
				this.entidade = config.getProperty("usuarios_entidade_nome");
				break;
			case TIPO_AUTENTICACAO:
				sgdb = config.getProperty("autenticacao_sgdb");
				host = config.getProperty("autenticacao_host");
				porta = config.getProperty("autenticacao_porta");
				bdNome = config.getProperty("autenticacao_bd_nome");
				usuario = config.getProperty("autenticacao_usuario");
				senha = config.getProperty("autenticacao_senha");
				this.entidade = config.getProperty("autenticacao_entidade_nome");
				break;
			default:
				sgdb = config.getProperty("default_sgdb");
				host = config.getProperty("default_host");
				porta = config.getProperty("default_porta");
				bdNome = config.getProperty("default_bd_nome");
				usuario = config.getProperty("default_usuario");
				senha = config.getProperty("default_senha");
				break;
			}
			file.close();
			if (sgdb.equals("postgres")) {
				Class.forName(DRIVER_POSTGRES);
				this.conexao = DriverManager.getConnection(JDBC_BANCO_POSTGRES+ "//" + host + "/" + bdNome, usuario, senha);
				
			} else if (sgdb.equals("sqlite")) {
				Class.forName(DRIVER_SQLITE);
				this.conexao = DriverManager.getConnection(JDBC_BANCO_SQLITE+bdNome);
			} else if (sgdb.equals("mysql")) {
				Class.forName(DRIVER_MYSQL);
				this.conexao = DriverManager.getConnection(JDBC_BANCO_MYSQL + "//" + host + "/" + bdNome, usuario, senha);
			}


		} catch (ClassNotFoundException e1) {
			e1.printStackTrace();
		} catch (SQLException e) {
			e.printStackTrace();
		} catch (FileNotFoundException e) {
			e.printStackTrace();
		} catch (IOException e) {
			e.printStackTrace();
		}
	}

	public Connection getConexao() {
		return conexao;
	}

	public void setConexao(Connection conexao) {
		this.conexao = conexao;
	}

	public void setTipoDeConexao(int tipoDeConexao) {
		this.tipoDeConexao = tipoDeConexao;
	}

	/**
	 * @return the entidade
	 */
	public String getEntidade() {
		return entidade;
	}

	/**
	 * @param entidade
	 *            the entidade to set
	 */
	public void setEntidade(String entidade) {
		this.entidade = entidade;
	}

	/**
	 * @return the sgdb
	 */
	public String getSgdb() {
		return sgdb;
	}

	/**
	 * @param sgdb
	 *            the sgdb to set
	 */
	public void setSgdb(String sgdb) {
		this.sgdb = sgdb;
	}

	public static final String ARQUIVO_CONFIGURACAO = "/dados/unicaffe/config_bd.ini";

	public static final int TIPO_DEFAULT = 0;
	public static final int TIPO_USUARIOS = 1;
	public static final int TIPO_AUTENTICACAO = 2;

	public static final String DRIVER_SQLITE = "org.sqlite.JDBC";
	public static final String JDBC_BANCO_SQLITE = "jdbc:sqlite:";

	public static final String JDBC_BANCO_POSTGRES = "jdbc:postgresql:";
	public static final String DRIVER_POSTGRES = "org.postgresql.Driver";
	public static final String JDBC_BANCO_MYSQL = "jdbc:mysql:";
	public static final String DRIVER_MYSQL = "com.mysql.jdbc.Driver";

}
