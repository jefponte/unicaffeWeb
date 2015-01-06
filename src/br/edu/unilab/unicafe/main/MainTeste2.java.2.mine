package br.edu.unilab.unicafe.main;

import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import br.edu.unilab.unicafe.dao.DAO;
import br.edu.unilab.unicafe.dao.UsuarioDAO;
import br.edu.unilab.unicafe.model.Usuario;

/**
 * 
 * @author Jefferson
 *
 */

public class MainTeste2 {

	public static void main(String[] args) {
		// testeAdd();
		testeLista();
	}

	public static void mostraTeste() {
		DAO dao = new DAO();
		try {
			PreparedStatement ps = dao.getConexao().prepareStatement(
					"SELECT * FROM usuario");
			ResultSet rs = ps.executeQuery();
			while (rs.next()) {
				System.out.println(rs.getString("nome"));
			}
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}

	}

	public static void testeAdd() {
		UsuarioDAO dao = new UsuarioDAO();
		Usuario usuario = new Usuario();
		usuario.setNome("Erivando Sena");
		usuario.setEmail("erivandoramos@unilab.edu.br");
		usuario.setLogin("erivando");
		usuario.setCpf("12345678912");
		usuario.setNome("admin");
		usuario.setEmail("admin");
		usuario.setLogin("admin");
		usuario.setCpf("123456");
		usuario.setNivelAcesso(1);
		usuario.setSenha("123456");

		if (dao.cadastra(usuario)) {
			System.out.println("V");

		} else {
			System.out.println("F");
		}

	}

	public static void testeLista() {
		UsuarioDAO dao = new UsuarioDAO();
		ArrayList<Usuario> lista;
		try {
			lista = dao.retornaLista();
			for (Usuario usuario : lista) {
				System.out.println(usuario.toString());
			}
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
	}

}
