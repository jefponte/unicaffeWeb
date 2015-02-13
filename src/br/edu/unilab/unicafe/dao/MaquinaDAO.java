package br.edu.unilab.unicafe.dao;

import java.math.BigInteger;
import java.security.MessageDigest;
import java.security.NoSuchAlgorithmException;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;

import br.edu.unilab.unicafe.model.Maquina;
import br.edu.unilab.unicafe.model.Usuario;

public class MaquinaDAO extends DAO{
	
	public MaquinaDAO(){
		super();
	}
	public MaquinaDAO(int tipoDeConexao){
		super(tipoDeConexao);
		
	}
	public MaquinaDAO(Connection conexao){
		super(conexao);
	}
	
	public ArrayList<Maquina>retornaLista(){
		ArrayList<Maquina>lista = new ArrayList<Maquina>();
		PreparedStatement ps;
		try {
			ps = this.getConexao().prepareStatement("SELECT * FROM maquina");
			ResultSet resultSet = ps.executeQuery();
			while(resultSet.next()){
				Maquina maquina = new Maquina();

				maquina.setNome(resultSet.getString("nome_maq"));
				maquina.setId(resultSet.getInt("id_maquina"));
				lista.add(maquina);
			}
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		
		
		return lista;
	}
	
	/**
	 * Apaga todo o registro de acesso.
	 */
	public void limpa(){
		try {
			PreparedStatement ps = this.getConexao().prepareStatement("DELETE FROM maquina");
			ps.executeQuery();
			
		} catch (SQLException e) {
		}		
	}

	/**
	 * Retorna True se a máquina existir. Verifica a partir do atributo nome da máquina. 
	 * 
	 * @param maquina
	 * @return
	 */
	public boolean existe(Maquina maquina){
		try {
			PreparedStatement ps = this.getConexao().prepareStatement("SELECT * FROM maquina WHERE nome_maq = ?");
			ps.setString(1, maquina.getNome());
			ResultSet rs = ps.executeQuery();
			while(rs.next()){
				maquina.setId(rs.getInt("id_maquina"));
				return true;
			}
			return false;					
			
		} catch (SQLException e) {
			return false;
		}		
		
	}
	/**
	 * Retorna true se a máquina for cadastrada com sucesso. 
	 * @param maquina
	 * @return
	 */

	public boolean cadastra(Maquina maquina){
		try {
			PreparedStatement ps = this.getConexao().prepareStatement("SELECT * FROM maquina WHERE nome_maq = ?");
			ps.setString(1, maquina.getNome());
			ResultSet rs = ps.executeQuery();
			while(rs.next())
				return false;
			PreparedStatement ps2 = this.getConexao().prepareStatement("INSERT into maquina(nome_maq) VALUES(?)");			
			ps2.setString(1, maquina.getNome());
			ps2.executeUpdate();
			
			PreparedStatement ps3 = this.getConexao().prepareStatement("SELECT * FROM maquina WHERE nome_maq = ?");
			ps3.setString(1, ""+maquina.getNome());
			ResultSet rs2 = ps3.executeQuery();
			while(rs2.next()){
				maquina.setId(rs2.getInt("id_maquina"));
				
			}
			return true;					
			
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
			return false;
		}		
	}

}
