package br.edu.unilab.unicafe.main;

import java.util.Calendar;
import java.util.GregorianCalendar;

import com.google.gson.Gson;

import br.edu.unilab.unicafe.model.Maquina;
import br.edu.unilab.unicafe.model.Usuario;

public class TesteJason {

	public static void main(String[] args) {
		GregorianCalendar calendar = new GregorianCalendar(); 
		int hora = calendar.get(Calendar.HOUR_OF_DAY);  
		System.out.println(hora);
	}

}
