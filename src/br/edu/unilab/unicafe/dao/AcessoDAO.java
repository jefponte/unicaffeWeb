package br.edu.unilab.unicafe.dao;

import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;

import br.edu.unilab.unicafe.model.Acesso;
import br.edu.unilab.unicafe.model.Maquina;
import br.edu.unilab.unicafe.model.Usuario;

public class AcessoDAO extends DAO{
	
	public static final int COTA = 3600;
	
	public AcessoDAO(){
		super();
	}
	public AcessoDAO(Connection conexao){
		super(conexao);
	}
	public AcessoDAO(int tipoDeConexao){
		super(tipoDeConexao);
		
	}
	/**
	 * Retorna toda a lista de acssos. 
	 * @return
	 */
	public ArrayList<Maquina> retornaLista(){
		ArrayList<Maquina> lista = new ArrayList<Maquina>();
		return lista;
		
	}
	/**
	 * Retorna todos os acessos de um usuário. 
	 * @param usuario
	 * @return
	 */
	public ArrayList<Acesso> retornaLista(Usuario usuario){
		
		
		ArrayList<Acesso> lista = new ArrayList<Acesso>();
		
		PreparedStatement ps;
		try {
			ps = this.getConexao().prepareStatement("SELECT * FROM acesso WHERE id_usuario = ?");
			ps.setInt(1, usuario.getId());
			ResultSet resultSet = ps.executeQuery();
			while(resultSet.next()){
				Acesso acesso = new Acesso();
				acesso.setTempoUsado(resultSet.getInt("tempo_usado"));
				lista.add(acesso);
			}
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		
		
		
		return lista;
		
	}

	public int retornaTempoUsado(Usuario usuario){
		int tempo = 0;
		for(Acesso acesso : this.retornaLista(usuario)){
			tempo += acesso.getTempoUsado();
		}
		return tempo;
	}
	
	
	/**
	 * Retorna true se a máquina for cadastrada com sucesso. 
	 * @param maquina
	 * @return
	 */

	public boolean cadastra(Acesso acesso){
		try {

			PreparedStatement ps2 = this.getConexao().prepareStatement("INSERT into acesso(id_usuario, tempo_usado) VALUES(?, ?)");			
			ps2.setInt(1, acesso.getUsuario().getId());
			ps2.setInt(2, acesso.getTempoUsado());
			ps2.executeUpdate();
			return true;					
			
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
			return false;
		}		
	}

	
}
