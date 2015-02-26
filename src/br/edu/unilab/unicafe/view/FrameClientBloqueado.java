package br.edu.unilab.unicafe.view;

import java.awt.BorderLayout;
import java.awt.Color;
import java.awt.Dimension;
import java.awt.Font;
import java.awt.Toolkit;
import java.awt.image.BufferedImage;
import java.io.IOException;

import javax.imageio.ImageIO;
import javax.swing.GroupLayout;
import javax.swing.GroupLayout.Alignment;
import javax.swing.ImageIcon;
import javax.swing.JButton;
import javax.swing.JFrame;
import javax.swing.JLabel;
import javax.swing.JPanel;
import javax.swing.JPasswordField;
import javax.swing.JTextField;
import javax.swing.LayoutStyle.ComponentPlacement;
import javax.swing.SwingConstants;
import javax.swing.border.LineBorder;

public class FrameClientBloqueado extends JFrame {

	/**
	 * 
	 */
	private static final long serialVersionUID = 1L;
	
	private JTextField textFieldUsuario;
	public JTextField getTextFieldUsuario(){
		return this.textFieldUsuario;
	}
	private JButton btnEntrar;
	public JButton getBtnEntrar(){
		return this.btnEntrar;
	}
	private JPasswordField passwordFieldSenha;
	public JPasswordField getPasswordFieldSenha(){
		return this.passwordFieldSenha;
	}
	private JLabel labelStatus;
	private JLabel labelMensagem;
	public JLabel getLabelMensagem(){
		
		return this.labelMensagem;
	}
	public JLabel getLabelStatus(){
		return this.labelStatus;
	}
	/**
	 * Launch the application.
	 */
	public FrameClientBloqueado() {
		getContentPane().setForeground(new Color(27, 54, 83));
		setBackground(new Color(27, 54, 83));
		initComponents();
	}

	/**
	 * Create the frame.
	 */
	private void initComponents() {
		//setBounds(100, 100, 450, 300);
		setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
		
		// Jpanel personalizado
		//JPanelImageResized panel = new JPanelImageResized();
		JPanel panel = new JPanel();
		panel.setForeground(new Color(27, 54, 83));
		//panel.setPathImage(UtilFrames.BASE_PATH_IMAGES + "fundoJanela.jpg");
		getContentPane().add(panel, BorderLayout.CENTER);
		setExtendedState(JFrame.MAXIMIZED_BOTH);
		setDefaultCloseOperation(JFrame.DO_NOTHING_ON_CLOSE);
		setAlwaysOnTop(true);
		setUndecorated(true);
		setResizable(false);
		panel.setBackground(new Color(27, 54, 83));
		panel.setBorder(new LineBorder(new Color(0, 0, 0)));
		panel.setLayout(new BorderLayout(0, 0));
		
		
		JLabel lblImgFormLogin = new JLabel();
		lblImgFormLogin.setIcon(new javax.swing.ImageIcon(new javax.swing.ImageIcon(getClass().getResource(UtilFrames.BASE_PATH_IMAGES + "fundoFormLogin.png")).getImage()));
		lblImgFormLogin.setHorizontalAlignment(SwingConstants.CENTER); 
		//panel.add(lblImgFormLogin, BorderLayout.CENTER);
		
		JLabel lblLogoUnicafe = new JLabel();
		lblLogoUnicafe.setIcon(new javax.swing.ImageIcon(new javax.swing.ImageIcon(getClass().getResource(UtilFrames.BASE_PATH_IMAGES + "logoUnicafe.png")).getImage()));
		lblLogoUnicafe.setHorizontalAlignment(SwingConstants.CENTER); 
		panel.add(lblLogoUnicafe, BorderLayout.WEST);
		
		JLabel lblLogoUnilab = new JLabel();
		lblLogoUnilab.setHorizontalAlignment(SwingConstants.CENTER);
		lblLogoUnilab.setIcon(new javax.swing.ImageIcon(new javax.swing.ImageIcon(getClass().getResource(UtilFrames.BASE_PATH_IMAGES + "logoUnilabVertical.png")).getImage()));
		panel.add(lblLogoUnilab, BorderLayout.EAST);
		
		JLabel lblLogoLabti = new JLabel();
		lblLogoLabti.setHorizontalAlignment(SwingConstants.CENTER);
		lblLogoLabti.setIcon(new javax.swing.ImageIcon(new javax.swing.ImageIcon(getClass().getResource(UtilFrames.BASE_PATH_IMAGES + "logoLabti.png")).getImage()));
		panel.add(lblLogoLabti, BorderLayout.NORTH);

		JPanelImageNormal panelImgFormLogin = new JPanelImageNormal();
		panelImgFormLogin.setPathImage(UtilFrames.BASE_PATH_IMAGES + "fundoFormLogin.png");

		JPanel panelFormLogin = new JPanel();
		panelFormLogin.setBackground(new Color(27, 54, 83));
		
		panel.add(panelFormLogin, BorderLayout.CENTER);
		GroupLayout gl_panelFormLogin = new GroupLayout(panelFormLogin);
		gl_panelFormLogin.setHorizontalGroup(
			gl_panelFormLogin.createParallelGroup(Alignment.LEADING)
				.addGroup(gl_panelFormLogin.createSequentialGroup()
					.addGap(285)
					.addComponent(panelImgFormLogin, GroupLayout.PREFERRED_SIZE, 777, GroupLayout.PREFERRED_SIZE)
					.addContainerGap(294, Short.MAX_VALUE))
		);
		gl_panelFormLogin.setVerticalGroup(
			gl_panelFormLogin.createParallelGroup(Alignment.LEADING)
				.addGroup(gl_panelFormLogin.createSequentialGroup()
					.addGap(277)
					.addComponent(panelImgFormLogin, GroupLayout.PREFERRED_SIZE, 329, GroupLayout.PREFERRED_SIZE)
					.addContainerGap(292, Short.MAX_VALUE))
		);
		gl_panelFormLogin.setHonorsVisibility(false);
		
		JLabel lblUsurio = new JLabel("Usu\u00E1rio");
		lblUsurio.setForeground(Color.WHITE);
		lblUsurio.setFont(new Font("Tahoma", Font.BOLD, 16));
		
		textFieldUsuario = new JTextField();
		textFieldUsuario.setFont(new Font("Tahoma", Font.PLAIN, 14));
		textFieldUsuario.setColumns(10);
		
		JLabel lblSenha = new JLabel("Senha");
		lblSenha.setForeground(Color.WHITE);
		lblSenha.setFont(new Font("Tahoma", Font.BOLD, 16));
		

		// BufferedImage e JButtons
		BufferedImage bi;
		try {
			bi = ImageIO.read(getClass().getResource(UtilFrames.BASE_PATH_IMAGES + "botaoEntrar.png"));
			btnEntrar = new JButton(new ImageIcon(bi));
			btnEntrar.setBorderPainted(false);
			btnEntrar.setFocusPainted(false);
			btnEntrar.setContentAreaFilled(false);
		} catch (IOException e) {
			e.printStackTrace();
		}
		
		labelStatus = new JLabel();
		labelStatus.setForeground(Color.WHITE);
		labelStatus.setFont(new Font("Arial", Font.PLAIN, 14));
		
		labelMensagem = new JLabel();
		labelMensagem.setForeground(Color.WHITE);
		labelMensagem.setFont(new Font("Arial", Font.PLAIN, 14));
		
		passwordFieldSenha = new JPasswordField();
		passwordFieldSenha.setFont(new Font("Tahoma", Font.PLAIN, 14));

		GroupLayout gl_panelImgFormLogin = new GroupLayout(panelImgFormLogin);
		gl_panelImgFormLogin.setHorizontalGroup(
			gl_panelImgFormLogin.createParallelGroup(Alignment.LEADING)
				.addGroup(gl_panelImgFormLogin.createSequentialGroup()
					.addGroup(gl_panelImgFormLogin.createParallelGroup(Alignment.LEADING)
						.addGroup(gl_panelImgFormLogin.createSequentialGroup()
							.addGap(223)
							.addGroup(gl_panelImgFormLogin.createParallelGroup(Alignment.LEADING, false)
								.addGroup(gl_panelImgFormLogin.createSequentialGroup()
									.addComponent(lblSenha, GroupLayout.PREFERRED_SIZE, 62, GroupLayout.PREFERRED_SIZE)
									.addGroup(gl_panelImgFormLogin.createParallelGroup(Alignment.LEADING)
										.addGroup(gl_panelImgFormLogin.createSequentialGroup()
											.addGap(10)
											.addGroup(gl_panelImgFormLogin.createParallelGroup(Alignment.LEADING)
												.addComponent(labelMensagem, GroupLayout.DEFAULT_SIZE, 232, Short.MAX_VALUE)
												.addComponent(btnEntrar, GroupLayout.PREFERRED_SIZE, 232, Short.MAX_VALUE)))
										.addGroup(gl_panelImgFormLogin.createSequentialGroup()
											.addPreferredGap(ComponentPlacement.UNRELATED)
											.addComponent(passwordFieldSenha, GroupLayout.DEFAULT_SIZE, 232, Short.MAX_VALUE))))
								.addGroup(gl_panelImgFormLogin.createSequentialGroup()
									.addComponent(lblUsurio)
									.addPreferredGap(ComponentPlacement.UNRELATED)
									.addComponent(textFieldUsuario))))
						.addGroup(gl_panelImgFormLogin.createSequentialGroup()
							.addGap(47)
							.addComponent(labelStatus, GroupLayout.PREFERRED_SIZE, 249, GroupLayout.PREFERRED_SIZE)))
					.addContainerGap(250, Short.MAX_VALUE))
		);
		gl_panelImgFormLogin.setVerticalGroup(
			gl_panelImgFormLogin.createParallelGroup(Alignment.LEADING)
				.addGroup(gl_panelImgFormLogin.createSequentialGroup()
					.addGap(86)
					.addGroup(gl_panelImgFormLogin.createParallelGroup(Alignment.BASELINE)
						.addComponent(lblUsurio)
						.addComponent(textFieldUsuario, GroupLayout.PREFERRED_SIZE, GroupLayout.DEFAULT_SIZE, GroupLayout.PREFERRED_SIZE))
					.addGap(9)
					.addGroup(gl_panelImgFormLogin.createParallelGroup(Alignment.TRAILING)
						.addComponent(lblSenha, GroupLayout.PREFERRED_SIZE, 20, GroupLayout.PREFERRED_SIZE)
						.addComponent(passwordFieldSenha, GroupLayout.PREFERRED_SIZE, GroupLayout.DEFAULT_SIZE, GroupLayout.PREFERRED_SIZE))
					.addPreferredGap(ComponentPlacement.UNRELATED)
					.addComponent(btnEntrar, GroupLayout.PREFERRED_SIZE, 39, GroupLayout.PREFERRED_SIZE)
					.addGap(25)
					.addComponent(labelMensagem, GroupLayout.PREFERRED_SIZE, 17, GroupLayout.PREFERRED_SIZE)
					.addGap(50)
					.addComponent(labelStatus, GroupLayout.PREFERRED_SIZE, 17, GroupLayout.PREFERRED_SIZE)
					.addContainerGap(30, Short.MAX_VALUE))
		);
		panelImgFormLogin.setLayout(gl_panelImgFormLogin);
		panelFormLogin.setLayout(gl_panelFormLogin);

		// Dimension
		Dimension janela = Toolkit.getDefaultToolkit().getScreenSize();
		setSize(janela.width, janela.height);
	}
}
