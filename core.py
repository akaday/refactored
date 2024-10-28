import cProfile

class Entity:
    # Represents a generic entity with an ID and a name
    def __init__(self, id, name):
        self.id = id
        self.name = name

class ToDoItem(Entity):
    # Represents a to-do item, inheriting from Entity
    def __init__(self, id, name, completed=False):
        super().__init__(id, name)
        self.completed = completed

    def mark_as_completed(self):
        # Marks the to-do item as completed
        self.completed = True

    def __str__(self):
        return f"{self.id}: {self.name} - Completed: {self.completed}"

def profile_mark_as_completed():
    todo = ToDoItem(1, "Learn Clean Architecture")
    todo.mark_as_completed()

# Example usage
if __name__ == "__main__":
    todo = ToDoItem(1, "Learn Clean Architecture")
    print(todo)
    cProfile.run('profile_mark_as_completed()')
    print(todo)
