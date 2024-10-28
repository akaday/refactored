# Define core routing logic
class Router:
    def __init__(self):
        self.routes = {}

    def add_route(self, path, handler):
        self.routes[path] = handler

    def handle_request(self, path):
        handler = self.routes.get(path, None)
        if handler:
            return handler()
        return "404 Not Found"

# Create a simple view
def home_view():
    return "Welcome to the Home Page"

# Initialize and configure the router
router = Router()
router.add_route("/", home_view)

# Handle a sample request
response = router.handle_request("/")
print(response)  # Output: Welcome to the Home Page
