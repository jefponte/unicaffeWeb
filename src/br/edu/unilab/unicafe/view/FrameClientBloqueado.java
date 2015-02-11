package br.edu.unilab.unicafe.view;

import java.awt.BorderLayout;
import java.awt.EventQueue;

import javax.swing.JFrame;
import javax.swing.JPanel;
import javax.swing.border.EmptyBorder;

import java.awt.Color;

import javax.swing.JLabel;
import javax.swing.JOptionPane;
import javax.swing.JTextField;
import javax.swing.JPasswordField;
import javax.swing.BoxLayout;

import java.awt.Dimension;
import java.awt.GridBagLayout;
import java.awt.GridBagConstraints;
import java.awt.Insets;
import java.awt.Toolkit;

import javax.swing.JSplitPane;
import javax.swing.GroupLayout;
import javax.swing.GroupLayout.Alignment;

import java.awt.Font;

import javax.swing.JButton;

import java.awt.SystemColor;
import java.awt.event.WindowEvent;
import java.awt.event.WindowListener;

import javax.swing.LayoutStyle.ComponentPlacement;

public class FrameClientBloqueado extends JFrame {

	private JPanel contentPane;
	private JTextField textLogin;
	private JPasswordField jpasswordSenha;

	/**
	 * Launch the application.
	 */
	public static void main(String[] args) {
		EventQueue.invokeLater(new Runnable() {
			public void run() {
				try {
					FrameClientBloqueado frame = new FrameClientBloqueado();
					frame.setVisible(true);
				} catch (Exception e) {
					e.printStackTrace();
				}
			}
		});
	}

	/**
	 * Create the frame.
	 */
	public FrameClientBloqueado() {
		
		//Metodos essenciais para uma janela de bloqueio. 
		
		setUndecorated(true);
		
		setResizable(false);
		setAlwaysOnTop(true);
		
		setDefaultCloseOperation(JFrame.DO_NOTHING_ON_CLOSE);
		setExtendedState(JFrame.MAXIMIZED_BOTH);
		Toolkit tk = Toolkit.getDefaultToolkit();  
	    Dimension d = tk.getScreenSize();  
	     
		setBounds(100, 100, d.width, d.height);
		contentPane = new JPanel();
		contentPane.setBorder(new EmptyBorder(5, 5, 5, 5));
		contentPane.setLayout(new BorderLayout(0, 0));
		setContentPane(contentPane);
		
		JPanel panel = new JPanel();
		panel.setBackground(new Color(51, 153, 255));
		contentPane.add(panel, BorderLayout.NORTH);
		
		JLabel lblUnicafeclient = new JLabel("UniCafeClient");
		lblUnicafeclient.setForeground(Color.WHITE);
		lblUnicafeclient.setFont(new Font("Tahoma", Font.BOLD, 18));
		
		JLabel lblNewLabel = new JLabel("UNILAB -  Universidade da Integra\u00E7\u00E3o Internacional da Lusofonia Afro-Brasileira");
		lblNewLabel.setForeground(Color.WHITE);
		lblNewLabel.setFont(new Font("Tahoma", Font.BOLD, 16));
		GroupLayout gl_panel = new GroupLayout(panel);
		gl_panel.setHorizontalGroup(
			gl_panel.createParallelGroup(Alignment.TRAILING)
				.addGroup(gl_panel.createSequentialGroup()
					.addGroup(gl_panel.createParallelGroup(Alignment.LEADING)
						.addGroup(gl_panel.createSequentialGroup()
							.addGap(627)
							.addComponent(lblNewLabel))
						.addGroup(gl_panel.createSequentialGroup()
							.addGap(894)
							.addComponent(lblUnicafeclient)))
					.addContainerGap(626, Short.MAX_VALUE))
		);
		gl_panel.setVerticalGroup(
			gl_panel.createParallelGroup(Alignment.TRAILING)
				.addGroup(gl_panel.createSequentialGroup()
					.addContainerGap(16, Short.MAX_VALUE)
					.addComponent(lblUnicafeclient)
					.addPreferredGap(ComponentPlacement.RELATED)
					.addComponent(lblNewLabel)
					.addContainerGap())
		);
		panel.setLayout(gl_panel);
		
		JPanel panel_1 = new JPanel();
		panel_1.setBackground(SystemColor.menu);
		contentPane.add(panel_1, BorderLayout.CENTER);
		
		JPanel panel_2 = new JPanel();
		panel_2.setLayout(null);
		panel_2.setBackground(SystemColor.textHighlight);
		
		JLabel label_1 = new JLabel("Login");
		label_1.setForeground(Color.WHITE);
		label_1.setFont(new Font("Tahoma", Font.PLAIN, 14));
		label_1.setBounds(95, 61, 46, 14);
		panel_2.add(label_1);
		
		JLabel label_2 = new JLabel("Senha");
		label_2.setForeground(Color.WHITE);
		label_2.setFont(new Font("Tahoma", Font.PLAIN, 14));
		label_2.setBounds(95, 104, 46, 14);
		panel_2.add(label_2);
		
		textLogin = new JTextField();
		textLogin.setBounds(168, 60, 168, 20);
		panel_2.add(textLogin);
		
		jpasswordSenha = new JPasswordField();
		jpasswordSenha.setColumns(10);
		jpasswordSenha.setBounds(168, 103, 168, 20);
		panel_2.add(jpasswordSenha);
		
		JButton btnLogar = new JButton("Acessar");
		this.btnLogar = btnLogar;
		btnLogar.setBounds(168, 145, 89, 23);
		panel_2.add(btnLogar);
		GroupLayout gl_panel_1 = new GroupLayout(panel_1);
		gl_panel_1.setHorizontalGroup(
			gl_panel_1.createParallelGroup(Alignment.LEADING)
				.addGroup(gl_panel_1.createSequentialGroup()
					.addGap(725)
					.addComponent(panel_2, GroupLayout.PREFERRED_SIZE, 457, GroupLayout.PREFERRED_SIZE)
					.addContainerGap(728, Short.MAX_VALUE))
		);
		gl_panel_1.setVerticalGroup(
			gl_panel_1.createParallelGroup(Alignment.LEADING)
				.addGroup(gl_panel_1.createSequentialGroup()
					.addGap(241)
					.addComponent(panel_2, GroupLayout.PREFERRED_SIZE, 237, GroupLayout.PREFERRED_SIZE)
					.addContainerGap(517, Short.MAX_VALUE))
		);
		
		JLabel label = new JLabel();
		label.setText("Status: ");
		label.setForeground(Color.WHITE);
		label.setFont(new Font("Times New Roman", Font.BOLD, 14));
		label.setBounds(28, 186, 48, 17);
		panel_2.add(label);
		
		JLabel label_3 = new JLabel();
		label_3.setText("Mensagem: ");
		label_3.setForeground(Color.WHITE);
		label_3.setFont(new Font("Times New Roman", Font.BOLD, 14));
		label_3.setBounds(28, 209, 75, 17);
		panel_2.add(label_3);
		
		JLabel labelStatus = new JLabel();
		this.labelStatus = labelStatus;
		labelStatus.setText("Sem Conex\u00E3o");
		labelStatus.setForeground(new Color(204, 0, 51));
		labelStatus.setFont(new Font("Times New Roman", Font.BOLD, 14));
		labelStatus.setBounds(87, 186, 360, 17);
		panel_2.add(labelStatus);
		
		JLabel labelMensagem = new JLabel();
		this.labelMensagem = labelMensagem;
		labelMensagem.setText("Errou A Senha");
		labelMensagem.setForeground(new Color(204, 0, 51));
		labelMensagem.setFont(new Font("Times New Roman", Font.BOLD, 14));
		labelMensagem.setBounds(113, 209, 334, 17);
		panel_2.add(labelMensagem);
		panel_1.setLayout(gl_panel_1);
		
		
		  addWindowListener(new WindowListener(){  
			  
			  @Override  
	            public void windowActivated(WindowEvent arg0) {  
	                // TODO Auto-generated method stub  
	                  
	            }  
	  
	            @Override  
	            public void windowClosed(WindowEvent arg0) {  
	                //Não aparece pq mandamos sair do prgrama lá em cima  
	               // JOptionPane.showMessageDialog(null, "Fechei");  
	                  
	            }  
	  
	            @Override  
	            public void windowClosing(WindowEvent arg0) {  
	                //JOptionPane.showMessageDialog(null, "Vou fechar");  
	                  
	            }  
	  
	            @Override  
	            public void windowDeactivated(WindowEvent arg0) {  
	                // TODO Auto-generated method stub  
	                  
	            }  
	  
	            @Override  
	            public void windowDeiconified(WindowEvent arg0) {  
	                //Você desminimizou");  
	                  
	            }  
	  
	            @Override  
	            public void windowIconified(WindowEvent arg0) {  
	                //Você minimizou  
	        		setExtendedState(JFrame.MAXIMIZED_BOTH);
	                  
	            }  
	  
	            @Override  
	            public void windowOpened(WindowEvent arg0) {  
	               //abriu o frame  
	                  
	            }  
	              
	        });    
	          
	}
	private JButton btnLogar;
	private JLabel labelStatus;
	private JLabel labelMensagem;
	public JLabel getLabelStatus() {
		return labelStatus;
	}
	public JLabel getLabelMensagem() {
		return labelMensagem;
	}
	
	

	public JTextField getTextLogin() {
		return this.textLogin;

	}

	public JPasswordField getJPasswordSenha() {
		return this.jpasswordSenha;

	}

	public JButton getBtnLogar() {
		return btnLogar;
	}

	
	
}
