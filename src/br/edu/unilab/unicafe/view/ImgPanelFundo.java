package br.edu.unilab.unicafe.view;

import java.awt.Graphics;
import java.awt.Graphics2D;
import java.awt.Rectangle;
import java.awt.TexturePaint;
import java.awt.geom.Rectangle2D;
import java.awt.image.BufferedImage;
import java.io.IOException;

import javax.imageio.ImageIO;
import javax.swing.JPanel;

/**
*
* @author Erivando Sena
*/


public class ImgPanelFundo extends JPanel {

	/**
	 * 
	 */
	private static final long serialVersionUID = 1L;

	private String pathImage = "";
	BufferedImage b;
	Rectangle2D rect;

	public ImgPanelFundo(String pathImage) {
		this.rect = new Rectangle(0,0,130,130);
		this.pathImage = pathImage;
	}

	@Override
	public void paintComponent(Graphics g) {
		Graphics2D g2d = (Graphics2D) g.create();
		try {
			// A Imagem é carregada através da classe ImageIO
			BufferedImage buffer = ImageIO.read(getClass().getResource(pathImage));
		    rect = new Rectangle(0,0,this.getWidth(),this.getHeight());
		    TexturePaint p = new TexturePaint(buffer,rect);
			g2d.drawImage(buffer, null, 0, 0); // desenha a imagem
			g2d.setPaint(p);
		    g2d.fillRect(0,0,this.getWidth(),this.getHeight());

		} catch (IOException ex) {
			ex.printStackTrace();
		}
		
	}

}
