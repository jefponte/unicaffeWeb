package br.edu.unilab.unicaffe.view;
import java.awt.Color;
import java.awt.Font;
import java.awt.event.MouseAdapter;
import java.awt.event.MouseEvent;
import javax.swing.BorderFactory;
import javax.swing.ImageIcon;
import javax.swing.JFrame;
import javax.swing.JLabel;
import javax.swing.JPanel;
import javax.swing.JTextArea;

/**
 * 
 * @author Jefferson Uchôa Ponte
 *
 */
public class FrameMensagem extends JFrame {
	private static final long serialVersionUID = 979694945391477156L;
	private JTextArea textAreaMensagem;
	public JTextArea getTextAreaMensagem() {
		return textAreaMensagem;
	}
	private JLabel labelLegenda;
	public void setMensagem(String texto) {
		this.textAreaMensagem.setText(texto);
	}
	public JLabel getLabelLegenda() {
		return this.labelLegenda;
	}
	private JPanel contentPane;

	/**
	 * Constroi uma janela com o icone do Unicaffe para envio de mensagens do
	 * administrador para o cliente.
	 * 
	 */
	public FrameMensagem() {
		setAlwaysOnTop(true);
		setDefaultCloseOperation(JFrame.DO_NOTHING_ON_CLOSE);
		setResizable(false);
		setUndecorated(true);

		setBounds(100, 100, 450, 300);
		contentPane = new JPanel();
		contentPane.setBackground(new Color(145, 216, 247));
		contentPane.addMouseListener(new MouseAdapter() {
			@Override
			public void mousePressed(MouseEvent e) {
				setVisible(false);
			}
		});
		contentPane.setBorder(BorderFactory.createMatteBorder(1, 1, 1, 1, Color.BLACK));
		setContentPane(contentPane);
		contentPane.setLayout(null);

		labelLegenda = new JLabel("Mensagem do \n Administrador:  ", JLabel.CENTER);
		labelLegenda.setIcon(new ImageIcon(getClass().getResource("/images/" + "carta.png")));
		labelLegenda.setForeground(Color.BLACK);
		labelLegenda.setBackground(new Color(145, 216, 247));
		labelLegenda.setFont(new Font("Tahoma", Font.PLAIN, 16));
		labelLegenda.setBounds(75, 80, 316, 29);
		labelLegenda.setOpaque(true);
		contentPane.add(labelLegenda);
		JLabel labelLogo = new JLabel("", JLabel.CENTER);
		labelLogo.setIcon(new ImageIcon(getClass().getResource("/images/" + "logo_unicaffe_p.png")));
		labelLogo.setBounds(0, 28, getWidth(), 55);
		contentPane.add(labelLogo);

		textAreaMensagem = new JTextArea(
				"Alguns usuários reclamaram que você está tomando café no laboratório. Tomar café não é algo permitido para o laboratório. Você deve tomar café lá na cantina, onde é espaço destinado para isso. Caso você tome café no laboratório pode correr o risco de que você derrame café na mesa, o que ocasionará uma infestação de formigas, que vão ser atraídas por outros insetos que comem formigas, como baratas e aranhas. Que serão atraídas por ratos, que por fim comerão os cabos dos computadores, que farão com que o laboratório não funcione com sua capacidade máxima, trazendo insatisfação entre os alunos, do qual você faz parte. Então para sua própria satisfação, peço que retire-se.   ");
		textAreaMensagem.setEditable(false);
		textAreaMensagem.setLineWrap(true);
		textAreaMensagem.setForeground(Color.BLACK);
		textAreaMensagem.setBackground(Color.WHITE);
		textAreaMensagem.setFont(new Font("Tahoma", Font.PLAIN, 16));
		textAreaMensagem.setBounds(10, 11, 382, 141);
		textAreaMensagem.setOpaque(true);

		JPanel painelMensagem = new JPanel();
		painelMensagem.setBackground(Color.WHITE);
		painelMensagem.setBorder(BorderFactory.createMatteBorder(1, 1, 1, 1, Color.BLACK));
		painelMensagem.setBounds(26, 114, 402, 163);
		painelMensagem.setLayout(null);
		painelMensagem.add(textAreaMensagem);
		contentPane.add(painelMensagem);
		setLocationRelativeTo(null);
		setDefaultCloseOperation(JFrame.DO_NOTHING_ON_CLOSE);
	}
}
