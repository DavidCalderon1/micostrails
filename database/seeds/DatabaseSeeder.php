<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(StatusTableSeeder::class);
        $this->call(CitiesTableSeeder::class);
        $this->call(ProvidersTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(TypeVehicleTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(StoragesTableSeeder::class);
        $this->call(VehiclesTableSeeder::class);
        $this->call(ProductsHasProvidersTableSeeder::class);
        $this->call(StoragesHasProductsTableSeeder::class);
        $this->call(PurchasesTableSeeder::class);
        $this->call(PurchasesDetailTableSeeder::class);
        $this->call(UsersHasRolesTableSeeder::class);
        $this->call(UsersAddressesTableSeeder::class);
        $this->call(OrdersTableSeeder::class);
        $this->call(TransportersHasVehiclesTableSeeder::class);
        $this->call(SalesTableSeeder::class);
    }
}
