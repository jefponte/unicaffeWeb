package br.edu.unilab.unicafe.view;

import java.awt.BorderLayout;
import java.awt.Color;
import java.awt.Dimension;
import java.awt.Toolkit;
import java.awt.image.BufferedImage;
import java.io.IOException;

import javax.imageio.ImageIO;
import javax.swing.GroupLayout;
import javax.swing.GroupLayout.Alignment;
import javax.swing.ImageIcon;
import javax.swing.JButton;
import javax.swing.JFrame;
import javax.swing.LayoutStyle.ComponentPlacement;
import javax.swing.border.LineBorder;
import javax.swing.JLabel;
import java.awt.Font;
import java.awt.event.MouseAdapter;
import java.awt.event.MouseEvent;

/**
 *
 * @author Erivando Sena
 */

public class FrameClientDesbloqueado extends JFrame {

	/**
	 * 
	 */
	private static final long serialVersionUID = 1L;

	JPanelImageResized background = null;
	private JButton btnChat;
	private JButton btnFinalizar;
	private JLabel lblBeta;
	private JLabel lblTempo;

	public JLabel getLblTempo() {
		return lblTempo;
	}

	private JLabel lblImgTime;
	private JLabel lblUsuario;
	private JLabel lblImgUsuario;
	private JLabel lblUnicaf;

	public JButton getBtnFinalizar() {
		return btnFinalizar;
	}

	public JLabel getLblUsuario() {
		return lblUsuario;
	}

	/**
	 * Launch the application.
	 */
	public FrameClientDesbloqueado() {
		initComponents();
	}

	/**
	 * Create the frame.
	 */
	private void initComponents() {
		// setBounds(0, 0, 450, 300);
		setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);

		// Jpanel personalizado
		JPanelImageResized panel = new JPanelImageResized();
		panel.setPathImage(UtilFrames.BASE_PATH_IMAGES + "fundoBarTarefas.jpg");
		getContentPane().add(panel, BorderLayout.CENTER);
		setDefaultCloseOperation(JFrame.DO_NOTHING_ON_CLOSE);
		setAlwaysOnTop(true);
		setUndecorated(true);
		setResizable(false);
		panel.setBackground(Color.WHITE);
		panel.setBorder(new LineBorder(new Color(0, 0, 0)));

		// Dimension
		Dimension janela = Toolkit.getDefaultToolkit().getScreenSize();
		setSize(janela.width, janela.height
				- (janela.height - janela.height * 3 / 100));

		// BufferedImage e JButtons
		BufferedImage bi;

		
		try {
			bi = ImageIO.read(getClass().getResource(
					UtilFrames.BASE_PATH_IMAGES + "botaofinalizar.jpg"));
			btnFinalizar = new JButton(new ImageIcon(bi));
			btnFinalizar.setBorderPainted(false);
			btnFinalizar.setFocusPainted(false);
			btnFinalizar.setContentAreaFilled(false);
			
		} catch (IOException e1) {
			// TODO Auto-generated catch block
			e1.printStackTrace();
		}

		

		try {
			bi = ImageIO.read(getClass().getResource(
					UtilFrames.BASE_PATH_IMAGES + "botaoChat.png"));
			btnChat = new JButton(new ImageIcon(bi));
			btnChat.addMouseListener(new MouseAdapter() {
				@Override
				public void mouseClicked(MouseEvent e) {
					System.out.println("Clicou no botão Chat");
				}
			});
			btnChat.setBorderPainted(false);
			btnChat.setFocusPainted(false);
			btnChat.setContentAreaFilled(false);
		} catch (IOException e) {
			e.printStackTrace();
		}

		// JLabels
		JLabel lblLogo = new JLabel("");
		lblLogo.setIcon(new javax.swing.ImageIcon(new javax.swing.ImageIcon(
				getClass().getResource(
						UtilFrames.BASE_PATH_IMAGES + "iconeBarra.png"))
				.getImage()));

		lblBeta = new JLabel("Beta");
		lblBeta.setForeground(Color.LIGHT_GRAY);

		lblTempo = new JLabel("00:00:00");
		lblTempo.setForeground(Color.WHITE);
		lblTempo.setFont(new Font("Tahoma", Font.BOLD, 16));

		lblImgTime = new JLabel();
		lblImgTime.setIcon(new javax.swing.ImageIcon(new javax.swing.ImageIcon(
				getClass().getResource(
						UtilFrames.BASE_PATH_IMAGES + "relogio32x32.png"))
				.getImage()));

		lblUsuario = new JLabel("Admin");

		lblUsuario.setForeground(Color.WHITE);
		lblUsuario.setFont(new Font("Tahoma", Font.BOLD, 16));

		lblImgUsuario = new JLabel();
		lblImgUsuario.setIcon(new javax.swing.ImageIcon(
				new javax.swing.ImageIcon(getClass().getResource(
						UtilFrames.BASE_PATH_IMAGES + "usuarios32x32.png"))
						.getImage()));

		lblUnicaf = new JLabel("UniCaf\u00E9");
		lblUnicaf.setFont(new Font("Tahoma", Font.BOLD, 11));
		lblUnicaf.setForeground(Color.WHITE);

		// GroupLayout
		GroupLayout gl_panel = new GroupLayout(panel);
		gl_panel.setHorizontalGroup(gl_panel.createParallelGroup(
				Alignment.LEADING).addGroup(
				gl_panel.createSequentialGroup()
						.addContainerGap()
						.addComponent(lblLogo)
						.addGap(2)
						.addComponent(lblUnicaf)
						.addPreferredGap(ComponentPlacement.RELATED)
						.addComponent(lblBeta, GroupLayout.PREFERRED_SIZE, 30,
								GroupLayout.PREFERRED_SIZE)
						.addGap(1307)
						.addComponent(lblImgUsuario,
								GroupLayout.PREFERRED_SIZE, 35,
								GroupLayout.PREFERRED_SIZE)
						.addPreferredGap(ComponentPlacement.RELATED)
						.addComponent(lblUsuario, GroupLayout.PREFERRED_SIZE,
								142, GroupLayout.PREFERRED_SIZE)
						.addPreferredGap(ComponentPlacement.RELATED,
								GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
						.addComponent(lblImgTime, GroupLayout.PREFERRED_SIZE,
								35, GroupLayout.PREFERRED_SIZE)
						.addPreferredGap(ComponentPlacement.RELATED)
						.addComponent(lblTempo, GroupLayout.PREFERRED_SIZE, 83,
								GroupLayout.PREFERRED_SIZE)
						.addGap(18)
						.addComponent(btnChat, GroupLayout.PREFERRED_SIZE, 61,
								GroupLayout.PREFERRED_SIZE)
						.addPreferredGap(ComponentPlacement.RELATED)
						.addComponent(btnFinalizar, GroupLayout.PREFERRED_SIZE,
								61, GroupLayout.PREFERRED_SIZE).addGap(75)));

		gl_panel.setVerticalGroup(gl_panel
				.createParallelGroup(Alignment.TRAILING)
				.addGroup(
						gl_panel.createSequentialGroup()
								.addGroup(
										gl_panel.createParallelGroup(
												Alignment.LEADING)
												.addGroup(
														gl_panel.createSequentialGroup()
																.addGap(2)
																.addGroup(
																		gl_panel.createParallelGroup(
																				Alignment.LEADING)
																				.addComponent(
																						lblLogo,
																						GroupLayout.DEFAULT_SIZE,
																						28,
																						Short.MAX_VALUE)
																				.addComponent(
																						lblUnicaf,
																						GroupLayout.DEFAULT_SIZE,
																						28,
																						Short.MAX_VALUE)
																				.addComponent(
																						lblBeta,
																						GroupLayout.PREFERRED_SIZE,
																						23,
																						GroupLayout.PREFERRED_SIZE)))
												.addGroup(
														gl_panel.createSequentialGroup()
																.addGap(2)
																.addComponent(
																		lblTempo,
																		GroupLayout.DEFAULT_SIZE,
																		28,
																		Short.MAX_VALUE))
												.addComponent(
														lblImgTime,
														GroupLayout.PREFERRED_SIZE,
														30,
														GroupLayout.PREFERRED_SIZE)
												.addComponent(
														lblImgUsuario,
														GroupLayout.PREFERRED_SIZE,
														30,
														GroupLayout.PREFERRED_SIZE)
												.addGroup(
														gl_panel.createSequentialGroup()
																.addGap(2)
																.addComponent(
																		lblUsuario,
																		GroupLayout.PREFERRED_SIZE,
																		28,
																		GroupLayout.PREFERRED_SIZE))
												.addGroup(
														gl_panel.createSequentialGroup()
																.addGap(2)
																.addGroup(
																		gl_panel.createParallelGroup(
																				Alignment.TRAILING,
																				false)
																				.addComponent(
																						btnFinalizar,
																						Alignment.LEADING,
																						0,
																						0,
																						Short.MAX_VALUE)
																				.addComponent(
																						btnChat,
																						Alignment.LEADING,
																						GroupLayout.PREFERRED_SIZE,
																						26,
																						GroupLayout.PREFERRED_SIZE))))
								.addContainerGap()));

		panel.setLayout(gl_panel);
	}
}
