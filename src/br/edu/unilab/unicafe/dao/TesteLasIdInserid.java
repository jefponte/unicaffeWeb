package br.edu.unilab.unicafe.dao;

import java.sql.PreparedStatement;
import java.sql.SQLException;

public class TesteLasIdInserid {
	public static void main(String[] args) {
		DAO dao = new DAO(DAO.TIPO_MYSQL);
		
		try {
			PreparedStatement ps = dao.getConexao().prepareStatement("INSERT into teste(aaa) values('aaa')");
			ps.executeUpdate();
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
	}

}
