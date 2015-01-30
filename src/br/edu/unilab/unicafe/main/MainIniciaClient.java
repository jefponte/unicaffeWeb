package br.edu.unilab.unicafe.main;

import java.io.IOException;
import java.util.Scanner;

public class MainIniciaClient {

	
	
	public static void main(String[] args) {
		Process process;
		try {

			process = Runtime
					.getRuntime()
					.exec("");
			Scanner leitor = new Scanner(process.getInputStream());
			while (leitor.hasNextLine()) {
				System.out.println(leitor.nextLine());
			}

			
			/*
			 * [HKEY_CURRENT_USER\Software\Microsoft\Windows NT\CurrentVersion\AppCompatFlags\Layers]
"C:\\PASTA\\SISTEMA.EXE"="RUNASADMIN"
[HKEY_CURRENT_USER\Software\Microsoft\Windows NT\CurrentVersion\AppCompatFlags\Layers\C:\PASTA]
"sistema.exe"="RUNASADMIN"
			 */
			

			
			//Runasadmin

			process = Runtime
					.getRuntime().exec("ipconfig");
			leitor = new Scanner(process.getInputStream());
			while (leitor.hasNextLine()) {
				System.out.println(leitor.nextLine());
			}


			
			
		} catch (IOException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		
	}
}
