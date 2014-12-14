package br.edu.unilab.unicafe.main;

import java.sql.SQLException;
import java.util.ArrayList;

import br.edu.unilab.unicafe.dao.DAO;
import br.edu.unilab.unicafe.dao.UsuarioDAO;
import br.edu.unilab.unicafe.model.Usuario;

public class ImportaSQLITE {

	public static void main(String[] args) {
		/*
		UsuarioDAO daoSQLITE = new UsuarioDAO(DAO.TIPO_SQLITE);
		
		UsuarioDAO daoMysql = new UsuarioDAO(DAO.TIPO_MYSQL);
		
		ArrayList<Usuario> listaDeUsuarios;
		try {
			listaDeUsuarios = daoMysql.retornaLista();
			for (Usuario usuario: listaDeUsuarios ) {
				System.out.println(usuario.getNome());
				if(daoSQLITE.cadastra(usuario)){
					System.out.println("Sucesso");
				}else{
					System.out.println("Fracasso");
				}
			}
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		
		*/
		

	}

}
