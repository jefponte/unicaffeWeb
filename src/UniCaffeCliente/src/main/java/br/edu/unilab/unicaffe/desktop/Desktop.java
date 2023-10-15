package br.edu.unilab.unicaffe.desktop;

import java.io.File;
import java.util.Collection;
import java.util.HashSet;

import br.edu.unilab.unicaffe.registro.model.Perfil;
import br.edu.unilab.unicaffe.registro.model.Registro;

/**
 * Esta classe redefine o local padrão para as pastas documentos, desktop,
 * downloads, imagens e músicas para um subdiretório com o nome do usuário do
 * UniCaffé.
 * 
 * @author Jefferson Uchôa Ponte
 */

public class Desktop {

	/**
	 * Caminho até o diretório onde se quer gravar as pastas de arquivos dos
	 * usuários. Esse caminho pode ser local ou remoto.
	 */
	private String caminho;
	/**
	 * Nome da pasta dentro do caminho que será a pasta dos arquivos do usuário.
	 */
	private String nomeDeUsuario;

	/**
	 * Além de construir o objeto desktopp cria uma lista de registros que deverão
	 * ser alterados para que o caminho da pasta documentos, desktpo, downloads,
	 * imagens, músicas seja modificado.
	 * 
	 * @param caminho
	 * @param nomeDeUsuario
	 */

	public Desktop(String caminho, String nomeDeUsuario) {

		this.nomeDeUsuario = nomeDeUsuario;

		this.caminho = caminho;
		perfilDesktop = new Perfil();
		Collection<Registro> listaPersonalizada = new HashSet<Registro>();
		perfilDesktop.setListaDeRegistros(listaPersonalizada);
		// Vamos deixar a pasta do desktop público não mexida pra que o usuário possa
		// ver os ícones.
		// listaPersonalizada.add(new
		// Registro("HKLM\\SOFTWARE\\Microsoft\\Windows\\CurrentVersion\\Explorer\\User
		// Shell Folders", "Common Desktop", Registro.REG_SZ,
		// caminho+"\\public\\Desktop", "%PUBLIC%\\Desktop","Muda a pasta da �rea de
		// trabalho p�blica. "));
		listaPersonalizada
				.add(new Registro("HKLM\\SOFTWARE\\Microsoft\\Windows\\CurrentVersion\\Explorer\\User Shell Folders",
						"Common Documents", Registro.REG_SZ, caminho + "\\public\\Documents", "%PUBLIC%\\Documents",
						"Muda a pasta da �rea de trabalho p�blica. "));
		listaPersonalizada
				.add(new Registro("HKLM\\SOFTWARE\\Microsoft\\Windows\\CurrentVersion\\Explorer\\User Shell Folders",
						"CommonMusic", Registro.REG_SZ, caminho + "\\public\\Music", "%PUBLIC%\\Music",
						"Muda a pasta da �rea de trabalho p�blica. "));
		listaPersonalizada
				.add(new Registro("HKLM\\SOFTWARE\\Microsoft\\Windows\\CurrentVersion\\Explorer\\User Shell Folders",
						"CommonPictures", Registro.REG_SZ, caminho + "\\public\\Pictures", "%PUBLIC%\\Pictures",
						"Muda a pasta da �rea de trabalho p�blica. "));
		listaPersonalizada
				.add(new Registro("HKLM\\SOFTWARE\\Microsoft\\Windows\\CurrentVersion\\Explorer\\User Shell Folders",
						"CommonVideo", Registro.REG_SZ, caminho + "\\public\\Videos", "%PUBLIC%\\Videos",
						"Muda a pasta da �rea de trabalho p�blica. "));
		listaPersonalizada
				.add(new Registro("HKLM\\SOFTWARE\\Microsoft\\Windows\\CurrentVersion\\Explorer\\User Shell Folders",
						"{374DE290-123F-4565-9164-39C4925E467B}", Registro.REG_SZ, caminho + "\\public\\Downloads",
						"%PUBLIC%\\Downloads", "Muda a pasta de downloads publica. "));
		listaPersonalizada
				.add(new Registro("HKCU\\Software\\Microsoft\\Windows\\CurrentVersion\\Explorer\\User Shell Folders",
						"Desktop", Registro.REG_EXPAND_SZ, caminho + "\\" + nomeDeUsuario + "\\" + "Desktop",
						"%USERPROFILE%\\Desktop", "Muda a pasta da �rea de trabalho do usu�rio corrente. "));
		listaPersonalizada
				.add(new Registro("HKCU\\Software\\Microsoft\\Windows\\CurrentVersion\\Explorer\\User Shell Folders",
						"My Music", Registro.REG_EXPAND_SZ, caminho + "\\" + nomeDeUsuario + "\\" + "Music",
						"%USERPROFILE%\\Music", "Muda a pasta da �rea de trabalho do usu�rio corrente. "));
		listaPersonalizada
				.add(new Registro("HKCU\\Software\\Microsoft\\Windows\\CurrentVersion\\Explorer\\User Shell Folders",
						"Personal", Registro.REG_EXPAND_SZ, caminho + "\\" + nomeDeUsuario + "\\" + "Documents",
						"%USERPROFILE%\\Documents", "Muda a pasta da area de trabalho do usu�rio corrente. "));
		listaPersonalizada
				.add(new Registro("HKCU\\Software\\Microsoft\\Windows\\CurrentVersion\\Explorer\\User Shell Folders",
						"My Pictures", Registro.REG_EXPAND_SZ, caminho + "\\" + nomeDeUsuario + "\\" + "Pictures",
						"%USERPROFILE%\\Pictures", "Muda a pasta da �rea de trabalho do usu�rio corrente. "));
		listaPersonalizada
				.add(new Registro("HKCU\\Software\\Microsoft\\Windows\\CurrentVersion\\Explorer\\User Shell Folders",
						"My Video", Registro.REG_EXPAND_SZ, caminho + "\\" + nomeDeUsuario + "\\" + "Videos",
						"%USERPROFILE%\\Videos", "Muda a pasta da �rea de trabalho do usu�rio corrente. "));
		listaPersonalizada
				.add(new Registro("HKCU\\Software\\Microsoft\\Windows\\CurrentVersion\\Explorer\\User Shell Folders",
						"{374DE290-123F-4565-9164-39C4925E467B}", Registro.REG_EXPAND_SZ,
						caminho + "\\" + nomeDeUsuario + "\\Downloads", "%USERPROFILE%\\Downloads",
						"Muda a pasta da �rea de trabalho do usu�rio corrente. "));
		listaPersonalizada
				.add(new Registro("HKCU\\Software\\Microsoft\\Windows\\CurrentVersion\\Explorer\\User Shell Folders",
						"Favorites", Registro.REG_EXPAND_SZ, caminho + "\\" + nomeDeUsuario + "\\" + "Favorites",
						"%USERPROFILE%\\Favorites", "Muda a pasta da �rea de trabalho do usu�rio corrente. "));
		listaPersonalizada
				.add(new Registro("HKCU\\Software\\Microsoft\\Windows\\CurrentVersion\\Explorer\\User Shell Folders",
						"Local AppData", Registro.REG_EXPAND_SZ, caminho + "\\" + nomeDeUsuario + "\\" + "local",
						"%USERPROFILE%\\AppData\\Local", "Muda a pasta da Area de trabalho do usuario corrente. "));

	}

	/**
	 * Verifica se a pasta com o caminho e nome do usuário do desktop está criada e
	 * cria caso contrário.
	 */

	public void verificaECria() {

		Collection<String> listaString = new HashSet<>();
		listaString.add(caminho + "\\public\\Desktop");
		listaString.add(caminho + "\\public\\Documents");
		listaString.add(caminho + "\\public\\Music");
		listaString.add(caminho + "\\public\\Pictures");
		listaString.add(caminho + "\\public\\Videos");
		listaString.add(caminho + "\\public\\Downloads");
		// listaString.add(caminho+"\\Downloads");
		// Downloads do usuario vai ser uma pasta só. Ela vai ser compartilhada pela
		// rede.
		listaString.add(caminho + "\\" + nomeDeUsuario + "\\" + "Desktop");
		listaString.add(caminho + "\\" + nomeDeUsuario + "\\" + "Music");
		listaString.add(caminho + "\\" + nomeDeUsuario + "\\Documents");
		listaString.add(caminho + "\\" + nomeDeUsuario + "\\" + "Pictures");
		listaString.add(caminho + "\\" + nomeDeUsuario + "\\" + "Videos");
		listaString.add(caminho + "\\" + nomeDeUsuario + "\\" + "local");

		listaString.add(caminho + "\\" + nomeDeUsuario + "\\Downloads");
		listaString.add(caminho + "\\" + nomeDeUsuario + "\\" + "Favorites");

		for (String pasta : listaString) {
			File diretorio = new File(pasta);
			if (!diretorio.exists())
				diretorio.mkdirs();

		}

	}

	/**
	 * Faz a mudança.
	 */
	public void alterarRegistro() {
		verificaECria();

//		perfilDesktop.executar();

	}

	/**
	 * Lista de registros que devem ser executados para modificar o local das pastas
	 * documentos, desktop, downloads, músicas, imagens.
	 */
	private Perfil perfilDesktop;

	/**
	 * Desfaz os registros, tornando o local das pastas documentos, desktop,
	 * downloads, músicas, imagens o local padrão para o usuário windows.
	 * 
	 */
	public void desfazer() {
		perfilDesktop.desfazer();

	}

}
