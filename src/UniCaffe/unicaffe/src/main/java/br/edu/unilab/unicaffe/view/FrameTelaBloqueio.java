package br.edu.unilab.unicaffe.view;

import java.awt.Cursor;
import java.awt.Dimension;
import java.awt.Image;
import java.awt.Toolkit;

import javax.swing.JFrame;
import javax.swing.JPanel;
import javax.swing.border.EmptyBorder;

import java.awt.Color;

import javax.swing.BorderFactory;
import javax.swing.JLabel;
import javax.swing.ImageIcon;
import javax.swing.JButton;
import javax.swing.JPasswordField;
import javax.swing.JTextField;

import java.awt.Font;
import java.awt.event.KeyAdapter;
import java.awt.event.KeyEvent;
import java.awt.event.WindowEvent;
import java.awt.event.WindowListener;
import java.awt.event.ActionListener;
import java.awt.event.ActionEvent;
import java.net.URL;

public class FrameTelaBloqueio extends JFrame {

	
	/**
	 * 
	 */
	private static final long serialVersionUID = 1L;
	private JLabel labelNomePC;
	public JLabel getLabelNomePC(){
		return this.labelNomePC;
	}
	private JLabel labelNomeLaboratorio;
	private JTextField textFieldLogin;
	private JPasswordField passwordFieldSenha;
	private JLabel labelMensagem;
	private JButton btnCancelar;
	private JButton btnEntrar;
	private JLabel lblUsuarioSig;
	private JLabel lblSenhaSig;
	private JPanel panelStatus;
	private JLabel labelStatus;
	private JPanel panelStatusIcone;
	private JLabel labelIconeStatus;
	private JPanel panelTopo;
	
	
	
	/**
	 * Create the frame.
	 */
	public FrameTelaBloqueio() {

		setUndecorated(true);
		setExtendedState(MAXIMIZED_BOTH);
		Toolkit tk = Toolkit.getDefaultToolkit();  
	    Dimension d = tk.getScreenSize();  
		setSize(d.width, d.height);
		
		
		
		JPanel contentPane = new JPanel();
		contentPane.setBackground(new Color(145, 216, 247));
		contentPane.setBorder(new EmptyBorder(5, 5, 5, 5));
		setContentPane(contentPane);
		contentPane.setLayout(null);
		setAlwaysOnTop(true);
		
		URL url = this.getClass().getResource(UtilFrames.BASE_PATH_IMAGES + "unicafe-logo-ap.png");    
		Image iconeTitulo = Toolkit.getDefaultToolkit().getImage(url);    
		this.setIconImage(iconeTitulo);
		
		JPanel panelForm2 = new JPanel();
		panelForm2.setBackground(Color.WHITE);
		panelForm2.setBounds((getWidth() - 322)/2, (getHeight() - 275)/2, 322, 275);
		contentPane.add(panelForm2);
		panelForm2.setLayout(null);
		
		
		JPanel panelForm = new JPanel();
		panelForm.setOpaque(false);
		panelForm.setBounds((getWidth() - 342)/2, (getHeight() - 295)/2, 342, 295);
		contentPane.add(panelForm);
		panelForm.setBorder(BorderFactory.createLineBorder(new Color(255, 255, 255),15, true));
		panelForm.setLayout(null);
		
		
		JLabel labelLogo2 = new JLabel("");
		labelLogo2.setIcon(new ImageIcon(getClass().getResource(UtilFrames.BASE_PATH_IMAGES + "logo_unicaffe_p.png")));
		labelLogo2.setBounds(33, 10, 256, 55);
		panelForm2.add(labelLogo2);
		
		
		
		JButton button = new JButton("");
		
		
		
		
		button.setIcon(new ImageIcon(getClass().getResource(UtilFrames.BASE_PATH_IMAGES + "user.png")));
		button.setBackground(new Color(164, 94, 77));
		button.setBounds(33, 97, 46, 37);
		panelForm2.add(button);
		button.setBorder(new EmptyBorder(1, 1, 1, 1));
		button.setFocusable(false);
		
		JButton button2 = new JButton("");
		
		button2.setIcon(new ImageIcon(getClass().getResource(UtilFrames.BASE_PATH_IMAGES + "key.png")));
		button2.setBackground(new Color(164, 94, 77));
		button2.setBounds(33, 144, 46, 37);
		panelForm2.add(button2);
		button2.setBorder(new EmptyBorder(1, 1, 1, 1));
		button2.setFocusable(false);
		
		

		btnCancelar = new JButton("Cancelar");
		btnCancelar.addActionListener(new ActionListener() {
			public void actionPerformed(ActionEvent arg0) {
				getTextFieldLogin().setText("");
				getPasswordFieldSenha().setText("");
				getTextFieldLogin().requestFocus();
				getLblUsuarioSig().setText("Usuário SIG");
				getLblSenhaSIG().setText("Senha SIG");
				
			}
		});
		btnCancelar.setForeground(new Color(255, 255, 255));
		btnCancelar.setFont(new Font("Tahoma", Font.PLAIN, 16));
		
		btnCancelar.setIcon(new ImageIcon(getClass().getResource(UtilFrames.BASE_PATH_IMAGES + "close.png")));
		btnCancelar.setBackground(new Color(164, 94, 77));
		btnCancelar.setBounds(33, 191, 125, 37);
		panelForm2.add(btnCancelar);
		btnCancelar.setBorder(new EmptyBorder(1, 1, 1, 1));
		btnCancelar.setFocusable(false);
		btnCancelar.setCursor(new Cursor(Cursor.HAND_CURSOR));
		
		btnEntrar = new JButton("Entrar");
		btnEntrar.setFont(new Font("Tahoma", Font.PLAIN, 16));
		btnEntrar.setForeground(new Color(255, 255, 255));
		
		btnEntrar.setIcon(new ImageIcon(getClass().getResource(UtilFrames.BASE_PATH_IMAGES + "door.png")));
		btnEntrar.setBackground(new Color(248, 158, 50));
		btnEntrar.setBounds(164, 191, 125, 37);
		panelForm2.add(btnEntrar);
		btnEntrar.setBorder(new EmptyBorder(1, 1, 1, 1));
		btnEntrar.setFocusable(false);
		btnEntrar.setCursor(new Cursor(Cursor.HAND_CURSOR));
		
		
		labelMensagem = new JLabel("", JLabel.CENTER);
		labelMensagem.setFont(new Font("Tahoma", Font.PLAIN, 14));
		labelMensagem.setBounds(33, 238, 279, 37);
		panelForm2.add(labelMensagem);
		
		textFieldLogin = new JTextField();
		
		textFieldLogin.addKeyListener(new KeyAdapter() {
			@Override
			public void keyTyped(KeyEvent e) {
				if(!textFieldLogin.getText().equals(""))
					getLblUsuarioSig().setText("");
				else
					getLblUsuarioSig().setText("Usuário SIG");
			}
			@Override
			public void keyPressed(KeyEvent e) {
				if (e.getKeyCode() == KeyEvent.VK_ENTER){
					getPasswordFieldSenha().requestFocus();
				} 
					
			}
		});
		
			
		textFieldLogin.setOpaque(false);

		
		textFieldLogin.setForeground(Color.BLACK);
		textFieldLogin.setFont(new Font("Tahoma", Font.PLAIN, 14));
		textFieldLogin.setBounds(79, 97, 210, 37);
		textFieldLogin.setBorder(BorderFactory.createLineBorder(new Color(164, 94, 77),1, false));
		textFieldLogin.setBorder(BorderFactory.createCompoundBorder(textFieldLogin.getBorder(), BorderFactory.createEmptyBorder(5, 5, 5, 5)));
		panelForm2.add(textFieldLogin);
		textFieldLogin.setColumns(10);
		
		passwordFieldSenha = new JPasswordField();
		passwordFieldSenha.setOpaque(false);
		passwordFieldSenha.setForeground(Color.BLACK);
		passwordFieldSenha.setFont(new Font("Tahoma", Font.PLAIN, 14));
		passwordFieldSenha.setBounds(79, 144, 210, 37);
		passwordFieldSenha.setBorder(BorderFactory.createLineBorder(new Color(164, 94, 77),1, false));
		passwordFieldSenha.setBorder(BorderFactory.createCompoundBorder(passwordFieldSenha.getBorder(), BorderFactory.createEmptyBorder(5, 5, 5, 5)));
		panelForm2.add(passwordFieldSenha);
		passwordFieldSenha.setColumns(10);
		
		
		
		
		
		lblUsuarioSig = new JLabel("Usuário SIG");
		lblUsuarioSig.setForeground(Color.LIGHT_GRAY);
		lblUsuarioSig.setFont(new Font("Tahoma", Font.PLAIN, 14));
		lblUsuarioSig.setBounds(84, 101, 100, 29);
		panelForm2.add(lblUsuarioSig);
		
		lblSenhaSig = new JLabel("Senha SIG");
		lblSenhaSig.setForeground(Color.LIGHT_GRAY);
		lblSenhaSig.setFont(new Font("Tahoma", Font.PLAIN, 14));
		lblSenhaSig.setBounds(84, 148, 100, 29);
		panelForm2.add(lblSenhaSig);
		
		
		passwordFieldSenha.addKeyListener(new KeyAdapter() {
			@SuppressWarnings("deprecation")
			@Override
			public void keyTyped(KeyEvent e) {
				if(!passwordFieldSenha.getText().equals(""))
					getLblSenhaSIG().setText("");
				else
					getLblSenhaSIG().setText("Senha SIG");
			}
		});
		
		panelTopo = new JPanel();
		panelTopo.setBackground(new Color(0, 158, 216));
		panelTopo.setBounds(0, 0, getWidth(), 68);
		contentPane.add(panelTopo);
		panelTopo.setLayout(null);
		
		JLabel labelLogo = new JLabel("");
		
		labelLogo.setIcon(new ImageIcon(getClass().getResource(UtilFrames.BASE_PATH_IMAGES + "logo_labpati3.png")));
		labelLogo.setBounds(20, 12, 203, 43);
		panelTopo.add(labelLogo);
		
		JPanel panelLab = new JPanel();
		panelLab.setBackground(new Color(211, 228, 245));
		panelLab.setBounds((getWidth() - 140), 12, 120, 43);
		panelTopo.add(panelLab);
		panelLab.setLayout(null);
		
		labelNomeLaboratorio = new JLabel("Laborat\u00F3rio",  JLabel.CENTER);
		labelNomeLaboratorio.setForeground(new Color(0, 158, 216));
		labelNomeLaboratorio.setFont(new Font("Tahoma", Font.PLAIN, 16));
		labelNomeLaboratorio.setBounds(0, 0, 120, 43);
		panelLab.add(labelNomeLaboratorio);
		
		JPanel panelLabIcone = new JPanel();
		panelLabIcone.setBounds((getWidth() - 185), 12, 45, 43);
		panelTopo.add(panelLabIcone);
		panelLabIcone.setLayout(null);
		
		JLabel labelLabIcone = new JLabel("", JLabel.CENTER);
		
		
		labelLabIcone.setIcon(new ImageIcon(getClass().getResource(UtilFrames.BASE_PATH_IMAGES + "lab.png")));
		labelLabIcone.setBounds(0, 0, 45, 43);
		panelLabIcone.add(labelLabIcone);
		
		
		
		JPanel panelPC = new JPanel();
		panelPC.setBackground(new Color(211, 228, 245));
		panelPC.setBounds((getWidth() - 315), 12, 120, 43);
		panelTopo.add(panelPC);
		panelPC.setLayout(null);
		
		labelNomePC = new JLabel("LABTI05",  JLabel.CENTER);
		labelNomePC.setForeground(new Color(0, 158, 216));
		labelNomePC.setFont(new Font("Tahoma", Font.PLAIN, 16));
		labelNomePC.setBounds(0, 0, 120, 43);
		panelPC.add(labelNomePC);
		
		JPanel panelPCIcone = new JPanel();
		panelPCIcone.setBounds((getWidth() - 360), 12, 45, 43);
		panelTopo.add(panelPCIcone);
		panelPCIcone.setLayout(null);
		
		JLabel labelPCIcone = new JLabel("", JLabel.CENTER);
		labelPCIcone.setIcon(new ImageIcon(getClass().getResource(UtilFrames.BASE_PATH_IMAGES + "pc.png")));
		labelPCIcone.setBounds(0, 0, 45, 43);
		panelPCIcone.add(labelPCIcone);
		
		

		panelStatus = new JPanel();
		
		panelStatus.setBackground(new Color(238, 65, 71));
		panelStatus.setBounds((getWidth() - 625), 12, 255, 43);
		panelTopo.add(panelStatus);
		panelStatus.setLayout(null);
		
		labelStatus = new JLabel("Desconectado. Verifique a rede.", JLabel.CENTER);
		labelStatus.setForeground(new Color(255, 255, 255));
		labelStatus.setFont(new Font("Tahoma", Font.PLAIN, 16));
		labelStatus.setBounds(0, 0, 255, 43);
		panelStatus.add(labelStatus);
		
		panelStatusIcone = new JPanel();
		panelStatusIcone.setBackground(new Color(237, 50, 55));
		panelStatusIcone.setBounds((getWidth() - 670), 12, 45, 43);
		panelTopo.add(panelStatusIcone);
		panelStatusIcone.setLayout(null);
		
		labelIconeStatus = new JLabel("", JLabel.CENTER);
		
		labelIconeStatus.setIcon(new ImageIcon(getClass().getResource(UtilFrames.BASE_PATH_IMAGES + "link-quebrado.png")));
		labelIconeStatus.setFont(new Font("Tahoma", Font.PLAIN, 16));
		labelIconeStatus.setBounds(0, 0, 45, 43);
		panelStatusIcone.add(labelIconeStatus);
		addWindowListener(new WindowListener() {

			@Override
			public void windowOpened(WindowEvent e) {

			}

			@Override
			public void windowIconified(WindowEvent e) {
				setExtendedState(JFrame.MAXIMIZED_BOTH);

			}

			@Override
			public void windowDeiconified(WindowEvent e) {
				// TODO Auto-generated method stub

			}

			@Override
			public void windowDeactivated(WindowEvent e) {
				// TODO Auto-generated method stub

			}

			@Override
			public void windowClosing(WindowEvent e) {
				// TODO Auto-generated method stub

			}

			@Override
			public void windowClosed(WindowEvent e) {
				// TODO Auto-generated method stub

			}

			@Override
			public void windowActivated(WindowEvent e) {
				// TODO Auto-generated method stub

			}
		});
		setDefaultCloseOperation(JFrame.DO_NOTHING_ON_CLOSE);
	}
	public void setStatusConexao(boolean status){
		if(status){
			panelStatus.setBackground(new Color(74, 185, 108));
			panelStatusIcone.setBackground(new Color(0, 168, 89));
			labelStatus.setText("Conectado. Aguardando Usuário.");
			labelIconeStatus.setIcon(new ImageIcon(getClass().getResource(UtilFrames.BASE_PATH_IMAGES + "link.png")));
		}else{
			panelStatus.setBackground(new Color(238, 65, 71));
			panelStatusIcone.setBackground(new Color(237, 50, 55));
			labelIconeStatus.setIcon(new ImageIcon(getClass().getResource(UtilFrames.BASE_PATH_IMAGES + "link-quebrado.png")));
			labelStatus.setText("Desconectado. Verifique a rede.");
		}
	}
	
	
	public void setNomePC(String nomePC){
		this.labelNomePC.setText(nomePC);
	}
	public void setNomeLaboratorio(String nomeLaboratorio){	
		this.labelNomeLaboratorio.setText(nomeLaboratorio);
	}
	
	public void resetCampos(){

		this.passwordFieldSenha.setText("");
		this.textFieldLogin.setText("");
		getLblUsuarioSig().setText("Usuário SIG");
		getLblSenhaSIG().setText("Senha SIG");
		
	}
	
	
	public JTextField getTextFieldLogin(){
		return this.textFieldLogin;
	}
	public JTextField getPasswordFieldSenha(){
		return this.passwordFieldSenha;
	}
	public JLabel getLabelMensagem(){
		return this.labelMensagem;
	}
	public JButton getBtnCancelar(){
		return this.btnCancelar;
	}
	public JButton getBtnEntrar(){
		return this.btnEntrar;
	}
	
	public JLabel getLblUsuarioSig(){
		return this.lblUsuarioSig;
	}
	public JLabel getLblSenhaSIG(){
		return this.lblSenhaSig;
	}
	
	public JLabel getLabelStatus(){
		return this.labelStatus;
	}
}
