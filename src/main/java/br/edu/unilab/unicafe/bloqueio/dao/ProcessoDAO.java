package br.edu.unilab.unicafe.bloqueio.dao;

import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;

import br.edu.unilab.unicafe.bloqueio.model.Processo;
import br.edu.unilab.unicafe.dao.DAO;

public class ProcessoDAO extends DAO {
	public ProcessoDAO() {
		super(TIPO_SQLITE);
	}

	
	/**
	 * A ideia é não permitir que um processo já cadastrado seja cadastrado de novo. 
	 * 
	 * @param lista
	 */
	public void cadastraLista(ArrayList<Processo> lista) {


		boolean processoJaExiste;
		for (Processo processo : lista) {
			processoJaExiste = false;
			try {
				PreparedStatement ps = this.getConexao().prepareStatement("SELECT * FROM processo WHERE imagem = ?");
				ps.setString(1, processo.getImagem());
				ResultSet rs = ps.executeQuery();
				while(rs.next()){
					if(rs.getString("imagem").equals(processo.getImagem())){
						processoJaExiste = true;
						break;	
						
					}
					
				}
				if(processoJaExiste)
					continue;
				
				PreparedStatement ps2 = this.getConexao().prepareStatement("INSERT into processo(imagem) VALUES(?)");			
				ps2.setString(1, processo.getImagem());
				System.out.println(processo.getImagem()+"Cadastrado. ");
				ps2.executeUpdate();
				
			} catch (SQLException e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
				
			}
		}


	}

}
