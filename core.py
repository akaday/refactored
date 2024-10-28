class Entity:
    def __init__(self, id, name):
        self.id = id
        self.name = name

class ToDoItem(Entity):
    def __init__(self, id, name, completed=False):
        super().__init__(id, name)
        self.completed = completed

    def mark_as_completed(self):
        self.completed = True

    def __str__(self):
        return f"{self.id}: {self.name} - Completed: {self.completed}"

# Example usage
if __name__ == "__main__":
    todo = ToDoItem(1, "Learn Clean Architecture")
    print(todo)
    todo.mark_as_completed()
    print(todo)
