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
			String[] bd = new String[6];
			switch (tipoDeConexao) {
			case TIPO_USUARIOS:
				bd[0] = config.getProperty("usuarios_sgdb");
				bd[1] = config.getProperty("usuarios_host");
				bd[2] = config.getProperty("usuarios_porta");
				bd[3] = config.getProperty("usuarios_bd_nome");
				bd[4] = config.getProperty("usuarios_usuario");
				bd[5] = config.getProperty("usuarios_senha");
				this.entidade = config.getProperty("usuarios_entidade");
				break;
			case TIPO_AUTENTICACAO:
				bd[0] = config.getProperty("autenticacao_sgdb");
				bd[1] = config.getProperty("autenticacao_bd_nome");
				bd[2] = config.getProperty("autenticacao_porta");
				bd[3] = config.getProperty("autenticacao_bd_nome");
				bd[4] = config.getProperty("autenticacao_usuario");
				bd[5] = config.getProperty("autenticacao_senha");
				this.entidade = config.getProperty("autenticacao_entidade");
				break;
			default:
				bd[0] = config.getProperty("default_sgdb");
				bd[1] = config.getProperty("default_host");
				bd[2] = config.getProperty("default_porta");
				bd[3] = config.getProperty("default_bd_nome");
				bd[4] = config.getProperty("default_usuario");
				bd[5] = config.getProperty("default_senha");
				break;
			}

			System.out.println(
					JDBC_BANCO_POSTGRES + "//" + bd[1] + ":" + bd[2] + "/" + bd[3] + ", " + bd[4] + "," + bd[5]);

			if (bd[0].equals("postgres")) {
				Class.forName(DRIVER_POSTGRES);
				this.conexao = DriverManager
						.getConnection(JDBC_BANCO_POSTGRES + "//" + bd[1] + ":" + bd[2] + "/" + bd[3], bd[4], bd[5]);
			} else if (bd[0].equals("sqlite")) {
				Class.forName(DRIVER_SQLITE);
				this.conexao = DriverManager.getConnection(JDBC_BANCO_SQLITE);

			} else if (bd[0].equals("mysql")) {
				Class.forName(DRIVER_MYSQL);
				this.conexao = DriverManager.getConnection(JDBC_BANCO_MYSQL + "//" + bd[1] + "/" + bd[3], bd[4], bd[5]);
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
	public static final String JDBC_BANCO_SQLITE = "jdbc:sqlite:banco.db";

	public static final String JDBC_BANCO_POSTGRES = "jdbc:postgresql:";
	public static final String DRIVER_POSTGRES = "org.postgresql.Driver";
	public static final String JDBC_BANCO_MYSQL = "jdbc:mysql:";
	public static final String DRIVER_MYSQL = "com.mysql.jdbc.Driver";

}
