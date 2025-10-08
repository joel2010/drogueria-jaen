<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('complaints_book', function (Blueprint $table) {
            $table->id();
            // Customer (complainant) information
            $table->string('first_name')->nullable();               // cliente_nombres
            $table->string('last_name')->nullable();                // cliente_apellidos
            $table->string('company_name')->nullable();             // cliente_razon_social
            $table->string('legal_representative')->nullable();     // cliente_representante
            $table->string('address')->nullable();                  // cliente_direccion
            $table->string('document_number', 50)->nullable();      // cliente_documento
            $table->string('email')->nullable();                    // cliente_email
            $table->string('phone')->nullable();                    // cliente_telefono
            $table->string('additional_address')->nullable();       // cliente_direccion_adicional
            $table->boolean('minor')->default(false);               // menor_edad
            $table->string('customer_type', 100)->nullable();       // tipo_cliente

            // Contracted good information
            $table->string('good')->nullable();                     // bien
            $table->string('invoice_number', 50)->nullable();       // factura_boleta
            $table->decimal('claimed_amount', 12, 2)->nullable();   // monto_reclamado
            $table->string('good_description')->nullable();         // descripcion_bien
            $table->string('product')->nullable();                  // producto

            // Complaint details
            $table->string('complaint_type', 100)->nullable();      // tipo_reclamo
            $table->text('complaint_detail')->nullable();           // detalle_reclamo
            $table->text('customer_request')->nullable();           // pedido_cliente
            $table->text('supplier_observations')->nullable();      // observaciones_proveedor

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('complaints_book');
    }
};
