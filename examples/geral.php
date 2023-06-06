<?php

use B3\Autorizacao;
use B3\Core\B3Controller;
use B3\Core\B3Http;

date_default_timezone_set('America/Sao_Paulo');
error_reporting(E_ALL);
ini_set('display_errors', 1);

require __DIR__ . "/../vendor/autoload.php";

$cert = __DIR__ . '/b3/certificacao/XXXXXXX.cer';
$sslKey = __DIR__ . '/b3/certificacao/XXXXXXXXX.key';
$pass = 'XXXXXX';

B3Controller::create()
        ->setCert([$cert, $pass])
        ->setSslKey([$sslKey, $pass]);

try{
    
    B3Controller::create()
            ->setConfig([
                'base_uri' => B3Http::BASE_URL_AUTH_HOMO
            ]);
    
    $auth = new Autorizacao();

    $token = $auth->gerar([
        'grant_type' => 'client_credentials',
        'client_id' => '4f945197-6b20-4af0-90fe-6a96b4292b28',
        'client_secret' => 'a2fe2851-eeb4-4e87-8e7d-04eb208729c2',
    ]);

    B3Controller::create()
            ->setToken($token)
            ->setConfig([
                'base_uri' => B3Http::BASE_URL_HOMO
            ]);

    ///---


    $cpr = new B3\CPR();

//    $detalhesCpr = $cpr->detalhes('XXXXXXXX');
//    
//    B3\Helper\B3Helper::dump($detalhesCpr);
    
    $cpr->registrar([
        "data" => [
            "instrument" => [
                "cprTypeCode" => "F",
                "otcRegisterAccountCode" => "05000.40-7",
                "otcPaymentAgentAccountCode" => "05000.40-7",
                "otcCustodianAccountCode" => "05000.00-5",
                "internalControlNumber" => "05000CPR000000001",
                "electronicEmissionIndicator" => "S",
                "isinCode" => "US0378331005",
                "issueDate" => "12/08/2022",
                "maturityDate" => "12/08/2022",
                "issueQuantity" => "1000",
                "issueValue" => "1000",
                "issueFinancialValue" => "1000000",
                "unitValue" => "1000",
                "referenceDate" => "12/08/2022",
                "profitabilityStartDate" => "12/08/2022",
                "automaticExpirationIndicator" => "S",
                "collaterals" => [
                    [
                        "collateralTypeCode" => "6",
                        "collateralTypeName" =>
                        "Imóvel Rural ABCD - Latitude X Longitude Y",
                        "constitutionProcessIndicator" => "S",
                        "otcBondsmanAccountCode" => "05000.40-7",
                        "documentNumber" => "09.346.601/0001-25",
                    ],
                ],
                "products" => [
                    [
                        "cprProductName" => "ARROZ",
                        "cprProductClassName" => "134",
                        "cprProductHarvest" => "9683",
                        "cprProductDescription" => "Algodão branco",
                        "cprProductQuantity" => "600",
                        "measureUnitName" => "QUILO",
                        "packagingWayName" => "SACA(60 KG)",
                        "cprProductStatusCode" => "0",
                        "productionTypeCode" => "1",
                    ],
                ],
                "issuers" => [
                    [
                        "cprIssuerName" => "João Pedro da Silva",
                        "documentNumber" => "09.346.601/0001-25",
                        "personTypeAcronym" => "PJ",
                        "stateAcronym" => "SP",
                        "cityName" => "SÃO JOSÉ DO RIO PRETO",
                        "ibgeCode" => "1234567",
                    ],
                ],
                "deposit" => [
                    "otcFavoredAccountCode" => "05000.10-8",
                    "documentNumber" => "09.346.601/0001-25",
                    "personTypeAcronym" => "PJ",
                    "selfNumber" => "1234",
                    "settlementModalityTypeCode" => "2",
                    "otcSettlementBankAccountCode" => "05000.00-5",
                    "depositQuantity" => "20",
                    "depositUnitPriceValue" => "10",
                ],
                "paymentMethod" => [
                    "paymentMethodCode" => "08",
                    "indexCode" => "0099",
                    "indexShortName" =>
                    "IPCA + 5%, se Selic < 8%. Caso contrário, 102% do DI",
                    "vcpIndicatorTypeCode" => "DI",
                    "indexadorPercentageValue" => "100",
                    "interestRateSpreadPercentage" => "5",
                    "interestRateCriteriaTypeCode" => "01",
                    "interestPaymentDate" => "01/12/2022",
                    "interestPaymentValue" => "2500000",
                ],
                "interestPaymentFlow" => [
                    "interestPaymentFrequencyCode" => "C",
                    "interestMonthsQuantity" => "30",
                    "timeUnitTypeCode" => "D",
                    "deadlineTypeCode" => "C",
                    "paymentStartDate" => "01/12/2022",
                ],
                "amortizationPaymentFlow" => [
                    "amortizationTypeCode" => "1",
                    "amortizationMonthsQuantity" => "6",
                    "timeUnitTypeCode" => "M",
                    "deadlineTypeCode" => "U",
                    "amortizationStartDate" => "01/12/2022",
                ],
                "scr" => [
                    "scrTypeCode" => "S",
                    "scrCustomerDetail" => "09346601000125",
                    "personTypeAcronym" => "PJ",
                    "documentNumber" => "09346601000125",
                    "contractCode" => "4522698787",
                    "operationModalityTypeCode" => "0101",
                    "bacenReferenceCode" => "44578874",
                    "finalityCode" => "6099",
                    "ipocCode" => "IPOC0001",
                ],
                "dolarEuroProfitability" => [
                    "calculationTypeCode" => "L",
                    "initialExchangeValue" => "5.29",
                    "fixingTypeCode" => "01",
                    "dataSourceTypeCode" => "01",
                ],
                "igpmIpcaProfitability" => [
                    "adjustmentFrequencyTypeCode" => "V",
                    "adjustmentProRataTypeCode" => "U",
                    "adjustmentTypeCode" => "1",
                ],
                "creditor" => [
                    "creditorName" => "Banco XPTO",
                    "documentNumber" => "09.346.601/0001-25",
                ],
                "ballast" => [
                    "ballastTypeCode" => "CDCA",
                    "lotNumber" => "Lote 123",
                    "ballastQuantity" => "5",
                    "currencyCode" => "008",
                    "transactionIdentification" => "12345",
                    "additionalText" => "CPR lastro de CDCA de 2022 a 2025",
                ],
                "registerOffice" => [
                    "cprNumber" => "12456",
                    "cprContractNumber" => "12456",
                ],
                "events" => [
                    [
                        "eventTypeCode" => "001",
                        "eventOriginalDate" => "12/08/2022",
                        "unitPriceValue" => "100",
                        "interestUnitPriceValue" => "1000",
                        "residualValue" => "5000",
                        "amortizationPercentage" => "10",
                        "eventQuantity" => "200",
                    ],
                ],
                "productionPlaces" => [["productionPlaceName" => "Fazenda XPTO"]],
                "greenCpr" => [
                    "greenCprIndicator" => "S",
                    "greenCprCertificateName" => "CERTIFICADORA ABC S/A",
                    "greenCprCertificateCnpjNumber" => "09.346.601/0001-25",
                    "greenCprGeoreferencingDescription" =>
                    "Latitude 23 graus Longitude 14 graus NDE",
                    "greenCprDeclarationIndicator" => "S",
                ],
                "deliveryPlace" => [
                    "documentDeadlineDaysNumber" => "360",
                    "placeName" => "Fazenda XPTO",
                    "stateAcronym" => "SP",
                    "cityName" => "SÃO PAULO",
                    "ibgeCode" => "1234567",
                ],
            ],
        ],
    ]);
} catch (Exception $ex) {

    B3\Helper\B3Helper::dump($ex);
    
}