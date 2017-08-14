package br.edu.unilab.unicafe.main;

import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;


import br.edu.unilab.unicafe.dao.DAO;
import br.edu.unilab.unicafe.model.Servidor;

/**
 * 
 * @author Jefferson
 *
 */
public class MainServidor {
	public static void main(String[] args) {
//		
//		Servidor servidor = new Servidor();
//		servidor.iniciaServico();
		
		
		DAO d = new DAO(DAO.TIPO_AUTENTICACAO);
		
		String sql = "SELECT * FROM usuarios_unicafe";
		try {
			PreparedStatement ps = d.getConexao().prepareStatement(sql);
			ResultSet result = ps.executeQuery();
			while(result.next()){
				System.out.println(result.getString("nome"));
				
			}
			
			
			
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		
	}
}
