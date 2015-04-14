package br.edu.unilab.unicafe.dao;

import java.io.ObjectInputStream.GetField;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;

import br.edu.unilab.unicafe.model.Usuario;

public class Importar {

	public static void main(String[] args) {

		// Alimentar Lista Menor

		ArrayList<Usuario> lista = new ArrayList<Usuario>();
		PreparedStatement ps;
		try {
			Connection conexaoSqlite = new DAO(DAO.TIPO_SQLITE).getConexao();
			
			
			ArrayList<Usuario> listaMaior = new ArrayList<Usuario>();
			PreparedStatement psMysql;

			
			
			
			Connection conexaoMysql = new DAO(DAO.TIPO_MYSQL).getConexao();
			psMysql = conexaoMysql.prepareStatement("SELECT * FROM usuario");
			ResultSet resultSetMysql = psMysql.executeQuery();
			while (resultSetMysql.next()) {
				Usuario usuario = new Usuario();
				usuario.setLogin(resultSetMysql.getString("login"));
				usuario.setNome(resultSetMysql.getString("nome"));
				usuario.setEmail(resultSetMysql.getString("email"));
				usuario.setCpf(resultSetMysql.getString("cpf_cnpj"));
				usuario.setSenha(resultSetMysql.getString("senha"));
				listaMaior.add(usuario);
				
				PreparedStatement prepareInsert = conexaoSqlite.prepareStatement("INSERT INTO usuario (nome, email, login, senha, nivel_acesso, cpf) VALUES(?, ?, ?, ?,?,?)");
				
				prepareInsert.setString(1, usuario.getNome());
				prepareInsert.setString(2, usuario.getEmail());
				prepareInsert.setString(3, usuario.getLogin());
				prepareInsert.setString(4, usuario.getSenha());
				prepareInsert.setInt(5, 1);
				prepareInsert.setString(6, usuario.getSenha());
				prepareInsert.executeUpdate();
				
				
			}

			
			

			
			
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}

	}

}
