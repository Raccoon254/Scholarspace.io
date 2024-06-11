<x-logged-out>
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-4">How to Pay for an Order</h1>
        <p class="mb-6">
            Paying for an order is a simple process. Follow the steps below to complete your payment and ensure your order is processed promptly.
        </p>

        <h2 class="text-2xl font-semibold mb-4">Steps to Pay for an Order</h2>

        <ol class="list-decimal list-inside mb-6">
            <li class="mb-4">
                <strong>Log In:</strong> Ensure you are logged in to your account. If you don't have an account, please <a href="{{ route('register') }}" class="text-blue-500 underline">register here</a>.
            </li>
            <li class="mb-4">
                <strong>Navigate to Your Orders:</strong> Go to your <a href="{{ route('orders.index') }}" class="text-blue-500 underline">Orders Page</a> to view your pending orders.
            </li>
            <li class="mb-4">
                <strong>Select the Order:</strong> Click on the order you want to pay for to view the order details and payment options.
            </li>
            <li class="mb-4">
                <strong>Choose a Payment Method:</strong> Select your preferred payment method from the available options: PayPal, Cash App, or Zelle.
            </li>
            <li class="mb-4">
                <strong>Follow the Payment Instructions:</strong> Each payment method has specific instructions:
                <ul class="list-disc bg-blue-500 p-4 rounded-lg text-white list-inside mt-2">
                    <li><strong>PayPal:</strong> Send your payment to our PayPal address: <strong>stevovosti64@gmail.com</strong>.</li>
                    <li><strong>Cash App:</strong> Send your payment to our Cash App username: <strong>$ExampleUsername</strong>.</li>
                    <li><strong>Zelle:</strong> Send your payment to our Zelle phone number: <strong>(123) 456-7890</strong>.</li>
                </ul>
            </li>
            <li class="mb-4">
                <strong>Verify the Payment:</strong> Once the payment is made, our system will automatically verify the transaction. This process may take a few moments.
            </li>
            <li class="mb-4">
                <strong>Order Processing:</strong> After the payment is verified, your order status will be updated, and we will start processing your order immediately.
            </li>
        </ol>

        <h2 class="text-2xl font-semibold mb-4">Accepted Payment Methods</h2>
        <div class="flex space-x-3 mb-4">
            <div class="w-32 ring-1 ring-inset bg-gray-50 relative rounded-lg ring-blue-200 p-2 h-auto">
                <img src="{{ asset('images/paypal.png') }}" alt="PayPal Logo" class="h-16 object-cover w-auto">
            </div>
            <div class="w-32 ring-1 ring-inset bg-gray-50 relative rounded-lg ring-blue-200 p-2 h-auto">
                <img src="{{ asset('images/cash-app-logo.png') }}" alt="Cash App Logo" class="h-16 object-cover w-auto">
            </div>
            <div class="w-32 ring-1 ring-inset bg-gray-50 relative rounded-lg ring-blue-200 p-2 h-auto">
                <img src="{{ asset('images/zelle.png') }}" alt="Zelle Logo" class="h-16 object-cover w-auto">
            </div>
        </div>

        <h2 class="text-2xl font-semibold mb-4">Payment Verification</h2>
        <p class="mb-6">
            After you make the payment, our system will verify the transaction. This process is usually quick, but in some cases, it may take a few minutes. You will be notified once your payment is successfully verified.
        </p>

        <h2 class="text-2xl font-semibold mb-4">Order Status Update</h2>
        <p class="mb-6">
            Once your payment is verified, the status of your order will be updated to "Processing." Our team will then begin working on your order immediately.
        </p>

        <h2 class="text-2xl font-semibold mb-4">Need Help?</h2>
        <p class="mb-6">
            If you encounter any issues during the payment process or have any questions, please contact our support team for assistance. We are here to help you.
        </p>
    </div>
</x-logged-out>
