package br.edu.unilab.unicaffe.main;

import java.io.BufferedReader;
import java.io.File;
import java.io.IOException;
import java.io.InputStreamReader;
import java.util.ArrayList;

import br.edu.unilab.unicaffe.controller.ClienteController;
import br.edu.unilab.unicaffe.desktop.Desktop;
import br.edu.unilab.unicaffe.registro.model.Registro;
import br.edu.unilab.unicaffe.view.FrameMensagem;

public class MainTeste {

	public static void main(String[] args) {

		ArrayList<Registro> listaDeRegistros = new ArrayList<>();
		listaDeRegistros.add(new Registro("HKEY_CLASSES_ROOT\\lnkfile\\shellex\\ContextMenuHandlers\\OpenContainingFolderMenu", 
				"", Registro.REG_SZ, "{37ea3a21-7493-4208-a011-7f9ea79ce9f5}", "{37ea3a21-7493-4208-a011-7f9ea79ce9f5}", ""));
		
		listaDeRegistros.add(new Registro("HKEY_CLASSES_ROOT\\LibraryLocation\\ShellEx\\ContextMenuHandlers\\OpenContainingFolderMenu", 
				"", Registro.REG_SZ, "{37ea3a21-7493-4208-a011-7f9ea79ce9f5}", "{37ea3a21-7493-4208-a011-7f9ea79ce9f5}", ""));
		
		listaDeRegistros.add(new Registro("HKEY_CLASSES_ROOT\\Results\\ShellEx\\ContextMenuHandlers\\OpenContainingFolderMenu", 
				"", Registro.REG_SZ, "{37ea3a21-7493-4208-a011-7f9ea79ce9f5}", "{37ea3a21-7493-4208-a011-7f9ea79ce9f5}", ""));
		
		
		listaDeRegistros.add(new Registro("HKEY_CLASSES_ROOT\\.symlink\\shellex\\ContextMenuHandlers\\OpenContainingFolderMenu", 
				"", Registro.REG_SZ, "{37ea3a21-7493-4208-a011-7f9ea79ce9f5}", "{37ea3a21-7493-4208-a011-7f9ea79ce9f5}", ""));
		
		
		for (Registro registro : listaDeRegistros) {
			try {
				Runtime.getRuntime().exec(registro.toString());
			} catch (IOException e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
			}
			
		}
		
//		try {
//
//			String line;
//			Process p = Runtime.getRuntime().exec(registro.toString());
//			BufferedReader input = new BufferedReader(new InputStreamReader(p.getInputStream()));
//			while ((line = input.readLine()) != null) {
//				System.out.println("Res: " + line);
//			}
//			input.close();
//
//		} catch (IOException e) {
//			// TODO Auto-generated catch block
//			e.printStackTrace();
//		}

	}

}
