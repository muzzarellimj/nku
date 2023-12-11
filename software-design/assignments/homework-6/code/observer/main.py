from abc import abstractmethod

class WeatherStation:
    def __init__(self):
        self.observers = []
        self.temperature = None

    def register_observer(self, observer):
        self.observers.append(observer)
    
    def remove_observer(self, observer):
        self.observers.remove(observer)

    def notify_observers(self):
        for observer in self.observers:
            observer.update(self.temperature)

    def set_temperature(self, temperature):
        self.temperature = temperature
        self.notify_observers()

class Consumer:
    @abstractmethod
    def update(self, temperature):
        pass

class DesktopApplication(Consumer):
    def update(self, temperature):
        print(f"DesktopApplication: temperature was updated as {temperature}")

class MobileApplication(Consumer):
    def update(self, temperature):
        print(f"MobileApplication: temperature was updated as {temperature}")

class WebApplication(Consumer):
    def update(self, temperature):
        print(f"WebApplication: temperature was updated as {temperature}")

# Driver code 

weather_station = WeatherStation()

desktop_application = DesktopApplication()
mobile_application = MobileApplication()
web_application = WebApplication()

weather_station.register_observer(desktop_application)
weather_station.register_observer(mobile_application)
weather_station.register_observer(web_application)

weather_station.set_temperature(50)
weather_station.set_temperature(100)

# Output:
#
# DesktopApplication: temperature was updated as 50
# MobileApplication: temperature was updated as 50
# WebApplication: temperature was updated as 50
# DesktopApplication: temperature was updated as 100
# MobileApplication: temperature was updated as 100
# WebApplication: temperature was updated as 100