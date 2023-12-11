import os
import pygame as pg

main_dir = os.path.split(os.path.abspath(__file__))[0]
SCREENRECT = pg.Rect(0, 0, 126*4, 480)

def load_image(file):
    """ loads an image, prepares it for play
    """
    file = os.path.join(main_dir, "data", file)
    try:
        surface = pg.image.load(file)
    except pg.error:
        raise SystemExit('Could not load image "%s" %s' % (file, pg.get_error()))
    return surface.convert()

def draw_background(screen, img):
  screen.blit(img, (0,0))
  screen.blit(img, (126,0))
  screen.blit(img, (126*2,0))
  screen.blit(img, (126*3,0))
  screen.blit(img, (126*4,0))
  
def main(winstyle=0):
    # Initialize pygame
    pg.init()
    
    winstyle = 0  
    bestdepth = pg.display.mode_ok(SCREENRECT.size, winstyle, 32)
    screen = pg.display.set_mode(SCREENRECT.size, winstyle, bestdepth)
    
    img = load_image("player1.gif")
    bgdtile = load_image("background.gif")

    xpos = 0
    ypos = 0
    loop = True
    while loop:
        # get input
        screen.blit(img, (xpos, ypos))
        for event in pg.event.get():
            if event.type == pg.QUIT:
                loop = False
        xpos += 1
        if xpos >= 126*4: xpos = 0; ypos = 0
        ypos += 1
        if ypos >= 480: xpos = 0; ypos = 0
        
        pg.display.flip()
        pg.time.wait(10)
        draw_background(screen, bgdtile)
    pg.quit()
    
if __name__ == "__main__":
    main()