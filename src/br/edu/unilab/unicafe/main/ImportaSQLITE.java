package br.edu.unilab.unicafe.main;

import javax.swing.JFrame;


/**
 * 
 * @author Jefferson
 *
 */

public class ImportaSQLITE {

	public static void main(String[] args) {
		
		
		//pequeno teste
		JFrame frame = new JFrame();
		frame.setDefaultCloseOperation(frame.EXIT_ON_CLOSE);
		frame.setSize(200, 200);
		frame.setVisible(true);
		/*

		UsuarioDAO daoSQLITE = new UsuarioDAO(DAO.TIPO_SQLITE);

		UsuarioDAO daoMysql = new UsuarioDAO(DAO.TIPO_MYSQL);

		ArrayList<Usuario> listaDeUsuarios;
		try {
			listaDeUsuarios = daoMysql.retornaLista();
			for (Usuario usuario : listaDeUsuarios) {
				System.out.println(usuario.getNome());
				if (daoSQLITE.cadastra(usuario)) {
					System.out.println("Sucesso");
				} else {
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
