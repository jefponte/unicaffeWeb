package br.edu.unilab.unicafe.main;

import java.sql.Date;
import java.sql.PreparedStatement;
import java.sql.SQLException;
import java.sql.Time;
import java.text.ParseException;
import java.text.SimpleDateFormat;

import br.edu.unilab.unicafe.dao.DAO;

public class TesteBesteiras {

	public static void main(String[] args) {
		//Como pegar data e hora atual do sistema operacional. 

		
		
		
		Date data = new Date(System.currentTimeMillis());    
		SimpleDateFormat formatarDate = new SimpleDateFormat("yyyy-MM-dd HH:mm:ss");   
		System.out.print(formatarDate.format(data));  
		
		
		SimpleDateFormat formatador = new SimpleDateFormat("yyyy-MM-dd HH:mm:ss");  
		try {
			java.util.Date data2 = formatador.parse(formatarDate.format(data).toString());
			Time time = new Time(data.getTime());
			System.out.println("tempo"+time);
		} catch (ParseException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}  
		
	}

}
