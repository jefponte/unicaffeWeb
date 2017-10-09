package br.edu.unilab.unicaffe.view;

import java.awt.BorderLayout;
import java.awt.Color;
import java.awt.EventQueue;
import java.awt.Font;
import java.awt.event.MouseAdapter;
import java.awt.event.MouseEvent;

import javax.swing.BorderFactory;
import javax.swing.ImageIcon;
import javax.swing.JFrame;
import javax.swing.JLabel;
import javax.swing.JPanel;
import javax.swing.JTextArea;
import javax.swing.border.EmptyBorder;
import javax.swing.SwingConstants;
import javax.swing.border.MatteBorder;
import javax.swing.DropMode;

public class FrameMensagem extends JFrame {

	private JPanel contentPane;

	/**
	 * Launch the application.
	 */
	public static void main(String[] args) {
		EventQueue.invokeLater(new Runnable() {
			public void run() {
				try {
					FrameMensagem frame = new FrameMensagem();
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
	public FrameMensagem() {
		setAlwaysOnTop(true);
		setDefaultCloseOperation(JFrame.DO_NOTHING_ON_CLOSE);
		setResizable(false);
		setUndecorated(true);
		
		setBounds(100, 100, 450, 300);
		contentPane = new JPanel();
		contentPane.setBackground(Color.WHITE);
		contentPane.addMouseListener(new MouseAdapter() {
			@Override
			public void mousePressed(MouseEvent e) {
				setVisible(false);
			}
		});
		contentPane.setBorder(BorderFactory.createMatteBorder(1, 1, 1, 1, Color.BLACK));
		setContentPane(contentPane);
		contentPane.setLayout(null);

		
		JLabel labelLegenda = new JLabel("Mensagem do \n Administrador:  ", JLabel.CENTER);
		labelLegenda.setIcon(new ImageIcon(getClass().getResource(UtilFrames.BASE_PATH_IMAGES + "carta.png")));
		labelLegenda.setForeground(Color.BLACK);
		labelLegenda.setBackground(Color.WHITE);
		labelLegenda.setFont(new Font("Tahoma", Font.PLAIN, 16));
		labelLegenda.setBounds(71, 121, 316, 29);
		labelLegenda.setOpaque(true);
		contentPane.add(labelLegenda);
		JLabel labelLogo = new JLabel("", JLabel.CENTER);
		labelLogo.setIcon(new ImageIcon(getClass().getResource(UtilFrames.BASE_PATH_IMAGES + "logo_unicaffe_p.png")));
		labelLogo.setBounds(0 , 55, getWidth(), 55);
		contentPane.add(labelLogo);
		
		JTextArea textAreaMensagem = new JTextArea("Alguns usuários relcamaram que você está tomando café no laboratório. Tomar café não é algo permitido para o laboratório. Você deve tomar café lá na cantina, onde é espaço destinado para isso. Caso você tome café no laboratório pode correr o risco de que você derrame café na mesa, o que ocasionará uma infestação de formigas, que vão ser atraídas por outros insetos que comem formigas, como baratas e aranhas. Que serão atraídas por ratos, que por fim comerão os cabos dos computadores, que farão com que o laboratório não funcione com sua capacidade máxima, trazendo insatisfação entre os alunos, do qual você faz parte. Então para sua própria satisfação, peço que retire-se.   ");
		textAreaMensagem.setEditable(false);
		textAreaMensagem.setLineWrap(true);
		textAreaMensagem.setForeground(Color.BLACK);
		textAreaMensagem.setBackground(Color.WHITE);
		textAreaMensagem.setFont(new Font("Tahoma", Font.PLAIN, 16));
		textAreaMensagem.setBounds(27, 11, 346, 105);
		textAreaMensagem.setOpaque(true);
						
		JPanel painelMensagem = new JPanel();
		painelMensagem.setBackground(Color.WHITE);
		painelMensagem.setBorder(BorderFactory.createMatteBorder(1, 1, 1, 1, Color.BLACK));
		painelMensagem.setBounds(26, 151, 402, 126);
		painelMensagem.setLayout(null);
		painelMensagem.add(textAreaMensagem );
		contentPane.add(painelMensagem);
		setLocationRelativeTo(null);
		setDefaultCloseOperation(JFrame.DO_NOTHING_ON_CLOSE);
	}
}
