<?php

namespace Tests\Browser;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ExampleTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testCreateProduct()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(59))
                ->visit('/myaccount/ads/create')

                // add images
                ->attach('input#addImage', __DIR__ . '/photos/products/7342228_2SZ.webp')
                ->attach('input#addImage', __DIR__ . '/photos/products/7342228_3GG.webp')
                ->attach('input#addImage', __DIR__ . '/photos/products/lxxjUHAcxa.webp')

                // add info
                ->type('productTitle', 'Cortador de Cabelos Hair Stylo CR02 127V - Mondial')
                ->type('productCod', '7898490160600')
                ->type('productBrand', 'Mondial')
                ->type('productModel', 'CR-02')
                ->type('productPrice', '47,40')
                ->type('productAmount', '100')

                // select situation of product
                ->click('label[for=newProduct]')

                // add variations
                ->click('.variations .titleWithButton label')
                ->value('.divOfCreateNewVariation #variationName', 'Voltagem')
                ->value('.divOfCreateNewVariation .values .value:nth-of-type(1) input', '110V')
                ->click('.divOfCreateNewVariation #buttonOfAddNewValue')
                ->value('.divOfCreateNewVariation .values .value:nth-of-type(2) input', '220V')
                ->click('.divOfCreateNewVariation #buttonOfconcluded')

                // add datasheet
                ->value('#box .datasheet table tr:nth-of-type(1) td:nth-of-type(1) textarea', 'Lâminas')
                ->value('#box .datasheet table tr:nth-of-type(1) td:nth-of-type(2) textarea', '1 Lamina de Aço Inox')

                ->value('#box .datasheet table tr:nth-of-type(2) td:nth-of-type(1) textarea', 'Pentes')
                ->value('#box .datasheet table tr:nth-of-type(2) td:nth-of-type(2) textarea', '04')

                ->value('#box .datasheet table tr:nth-of-type(3) td:nth-of-type(1) textarea', 'Funções')
                ->value('#box .datasheet table tr:nth-of-type(3) td:nth-of-type(2) textarea', 'Cortador de Cabelo')

                ->value('#box .datasheet table tr:nth-of-type(4) td:nth-of-type(1) textarea', 'Voltagem')
                ->value('#box .datasheet table tr:nth-of-type(4) td:nth-of-type(2) textarea', '110V ou 220V (não é bivolt)')

                ->value('#box .datasheet table tr:nth-of-type(5) td:nth-of-type(1) textarea', 'Potência (W)')
                ->value('#box .datasheet table tr:nth-of-type(5) td:nth-of-type(2) textarea', '10 w')

                // add descriptions
                ->type('productDescription', `
                    Sua aparência vai manter-se incrível com seus fios sendo aparados com maior praticidade e periodicidade. AHair Stylo é uma máquina de corte completa, pois além de possuir 4 opções de altura de corte, ainda traz um kit completo para acabamentos.

                    Todas as informações divulgadas são de responsabilidade do fabricante/fornecedor.

                    Não nos responsabilizamos pela montagem/instalação dos produtos.

                    Todas as informações divulgadas são de responsabilidade do fabricante/fornecedor.

                    Imagens Meramente Ilustrativas.

                    Verifique com os fabricantes do produto e de seus componentes eventuais limitações à utilização de todos os recursos e funcionalidades.
                `)

                // add midia
                ->type('midia', 'https://www.youtube.com/watch?v=ewYArpSEjdQ')

                ->click('#buttonSubmit')

                // address
                ->assertDataAttribute('#box', 'dusk', 'address')
                ->click('#box .addresses .address label')
                ->click("#box [type='submit']")

                // way to get paid of ad
                ->assertDataAttribute('#box', 'dusk', 'wayToGetPaidOfAd')
                ->select("#box input#pagseguro", 'pagseguro')
                ->click("#box [type='submit']")

                // warranty
                ->assertDataAttribute('#box', 'dusk', 'warranty')
                ->select("#box input#withoutWarranty", 'without')
                ->click("#box .buttonSubmit button[type='submit']")

                // finished
                ->assertDataAttribute('#box', 'dusk', 'finished');
        });
    }
}
