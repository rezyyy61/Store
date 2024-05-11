<x-app-layout>
    <form action="{{ route('checkout') }}" method="POST">
        @csrf
        <input type="text" name="card_number" placeholder="Card Number">
        <input type="text" name="expiry" placeholder="MM/YY">
        <input type="text" name="cvc" placeholder="CVC">
        <input type="submit" value="Pay Now">
    </form>

</x-app-layout>
