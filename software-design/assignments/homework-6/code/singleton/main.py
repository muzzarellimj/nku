import threading

class Configuration:
    __instance = None

    def __new__(cls):
        if cls.__instance is None:
            cls.__instance = super(Configuration, cls).__new__(cls)
            cls.__instance.settings = {}
            cls.__lock = threading.Lock()

        return cls.__instance
    
    def set(self, key, value):
        with self.__lock:
            self.settings[key] = value

    def get(self, key):
        with self.__lock:
            if key in self.settings:
                return self.settings[key]
            else:
                return None
            
# Driver code

configuration = Configuration()
configuration.set("database_username", "admin")
configuration.set("database_password", "password")

database_username = configuration.get("database_username")
database_password = configuration.get("database_password")

print(database_username)
print(database_password)

# Output:
# 
# admin
# password