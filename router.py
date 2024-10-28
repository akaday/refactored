# Define core routing logic
class Router:
    # Router class handles the routing logic for the application
    def __init__(self):
        self.routes = {}

    def add_route(self, path, handler):
        # Adds a new route to the router
        self.routes[path] = handler

    def handle_request(self, path):
        # Handles incoming requests and returns the appropriate response
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
