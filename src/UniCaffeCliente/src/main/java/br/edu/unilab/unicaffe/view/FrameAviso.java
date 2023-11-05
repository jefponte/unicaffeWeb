package br.edu.unilab.unicaffe.view;

import javax.swing.JFrame;
import javax.swing.JPanel;
import java.awt.event.MouseAdapter;
import java.awt.event.MouseEvent;
import javax.swing.JLabel;
import java.awt.Font;
import java.awt.Color;
import javax.swing.BorderFactory;
import javax.swing.ImageIcon;

/**
 * 
 * @author Jefferson Uchôa Ponte Esta classe cria uma janela de aviso.
 *
 */

public class FrameAviso extends JFrame {
	private static final long serialVersionUID = 1L;
	private JPanel contentPane;
	private JLabel labelAviso3;
	private JLabel labelAviso2;
	private JLabel labelAviso;

	/**
	 * Constroi uma janela com o icone do Unicaffe e com o aviso em Português,
	 * Criolo e Tetum. Serve para avisar que o tempo de acesso está finalizando.
	 */
	public FrameAviso() {

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

		labelAviso3 = new JLabel("Ankama wu kwaze níkuhela", JLabel.CENTER);
		labelAviso3.setIcon(new ImageIcon(getClass().getResource("/images/" + "relogio.png")));
		labelAviso3.setOpaque(true);
		labelAviso3.setBackground(Color.WHITE);
		labelAviso3.setForeground(Color.BLACK);
		labelAviso3.setFont(new Font("Tahoma", Font.PLAIN, 16));
		labelAviso3.setBounds(69, 220, 298, 29);
		contentPane.add(labelAviso3);

		labelAviso2 = new JLabel("Bu tempu pertu kaba. ", JLabel.CENTER);
		labelAviso2.setIcon(new ImageIcon(getClass().getResource("/images/" + "relogio.png")));
		labelAviso2.setOpaque(true);
		labelAviso2.setBackground(Color.WHITE);
		labelAviso2.setForeground(Color.BLACK);
		labelAviso2.setFont(new Font("Tahoma", Font.PLAIN, 16));
		labelAviso2.setBounds(39, 180, 316, 29);
		contentPane.add(labelAviso2);

		labelAviso = new JLabel("O seu tempo está acabando. ", JLabel.CENTER);

		labelAviso.setIcon(new ImageIcon(getClass().getResource("/images/" + "relogio.png")));
		labelAviso.setForeground(Color.BLACK);
		labelAviso.setBackground(Color.WHITE);
		labelAviso.setFont(new Font("Tahoma", Font.PLAIN, 16));
		labelAviso.setBounds(30, 140, 380, 29);
		labelAviso.setOpaque(true);
		contentPane.add(labelAviso);

		JLabel label_3 = new JLabel("", JLabel.CENTER);
		label_3.setIcon(new ImageIcon(getClass().getResource("/images/" + "logo_unicaffe_p.png")));
		label_3.setBounds(0, 55, getWidth(), 55);
		contentPane.add(label_3);
		setLocationRelativeTo(null);
		setDefaultCloseOperation(JFrame.DO_NOTHING_ON_CLOSE);
	}
}
