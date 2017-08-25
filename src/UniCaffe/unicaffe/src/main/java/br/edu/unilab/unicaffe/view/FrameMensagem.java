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
import javax.swing.border.EmptyBorder;

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

		
		JLabel labelMensagem = new JLabel("Mensagem do Administrador: . ", JLabel.CENTER);
		labelMensagem.setIcon(new ImageIcon(getClass().getResource(UtilFrames.BASE_PATH_IMAGES + "relogio.png")));
		labelMensagem.setForeground(Color.BLACK);
		labelMensagem.setBackground(Color.WHITE);
		labelMensagem.setFont(new Font("Tahoma", Font.PLAIN, 16));
		labelMensagem.setBounds(30, 140, 380, 29);
		labelMensagem.setOpaque(true);
		contentPane.add(labelMensagem);
		
		
		
		JLabel labelLogo = new JLabel("", JLabel.CENTER);
		labelLogo.setIcon(new ImageIcon(getClass().getResource(UtilFrames.BASE_PATH_IMAGES + "logo_unicaffe_p.png")));
		labelLogo.setBounds(0 , 55, getWidth(), 55);
		contentPane.add(labelLogo);
		setLocationRelativeTo(null);
		
		
		setDefaultCloseOperation(JFrame.DO_NOTHING_ON_CLOSE);
	}

}
