import os
import pygame as pg

main_dir = os.path.split(os.path.abspath(__file__))[0]

def load_sound(file):
    """ because pygame can be be compiled without mixer.
    """
    if not pg.mixer:
        return None
    file = os.path.join(main_dir, "data", file)
    try:
        sound = pg.mixer.Sound(file)
        return sound
    except pg.error:
        print("Warning, unable to load, %s" % file)
    return None

def main(winstyle=0):
    # Initialize pygame
    pg.init()
    
    boom_sound = load_sound("boom.wav")
    shoot_sound = load_sound("car_door.wav")
    punch_sound = load_sound("punch.wav")
    secosmic_lo = load_sound("secosmic_lo.wav")
    
    secosmic_lo.play()
    for i in range(5):
      boom_sound.play()
      pg.time.wait(1000)
      shoot_sound.play()
      pg.time.wait(1000)
      punch_sound.play()
      pg.time.wait(1000)
    secosmic_lo.play()                
    pg.quit()
    
if __name__ == "__main__":
    main()