<div id="sidebar">
    <div>
        <div>
            <a class="shopping {{ isset($shopping) ? 'active' : '' }}" href="{{ route('myAccountShopping') }}">
                <p>Compras</p>
            </a>

            <a class="sales {{ isset($sales) ? 'active' : '' }}" href="{{ route('myAccountSales') }}">
                <p>Vendas</p>
            </a>

            <a class="configurations {{ isset($configurations) ? 'active' : '' }}" href="{{ route('myAccountConfig') }}">
                <p>Configurações</p>
            </a>
        </div>
    </div>
</div>
