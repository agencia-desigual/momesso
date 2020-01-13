-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 13-Jan-2020 às 19:41
-- Versão do servidor: 10.1.37-MariaDB
-- versão do PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `momesso_site`
--

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `id_categoria_mae`, `nome`, `imagem`, `slug`) VALUES
(1, NULL, 'Agro', '2020-01-10-055612.png', 'agro'),
(2, NULL, 'Plátisco', '2020-01-10-055631.png', 'platisco'),
(3, 1, 'Centro de Tratamento de Sementes', NULL, 'centro-de-tratamento-de-sementes'),
(4, 1, 'Tratamento Industrial', NULL, 'tratamento-industrial'),
(6, 1, 'Tratamento On Farm e Laboratório', NULL, 'tratamento-on-farm-e-laboratorio'),
(7, 1, 'Tratamento de sementes', NULL, 'tratamento-de-sementes'),
(8, 1, 'Beneficiamento e Rebeneficiamento', NULL, 'beneficiamento-e-rebeneficiamento'),
(9, 2, 'Moinhos', NULL, 'moinhos'),
(10, 2, 'Misturadores', NULL, 'misturadores');

--
-- Extraindo dados da tabela `imagem`
--

INSERT INTO `imagem` (`id_imagem`, `id_produto`, `imagem`, `capa`) VALUES
(1, 1, '2020-01-10-060334.png', 1),
(2, 2, '2020-01-10-061848.jpg', 1),
(3, 3, '2020-01-10-062113.jpg', 1),
(4, 3, '2020-01-10-062327.png', 0),
(5, 3, '2020-01-10-062334.png', 0),
(6, 3, '2020-01-10-062342.png', 0),
(7, 3, '2020-01-10-062348.png', 0),
(8, 3, '2020-01-10-062355.png', 0),
(9, 4, '2020-01-10-062643.jpg', 1),
(10, 5, '2020-01-10-063353.jpg', 1),
(11, 5, '2020-01-10-063446.jpg', 0),
(12, 5, '2020-01-10-063453.jpg', 0),
(13, 5, '2020-01-10-063458.jpg', 0),
(14, 6, '2020-01-10-063836.jpg', 1),
(15, 6, '2020-01-10-063909.jpg', 0),
(16, 6, '2020-01-10-063930.jpg', 0),
(17, 6, '2020-01-10-063941.jpg', 0),
(18, 7, '2020-01-13-100405.jpg', 1),
(19, 7, '2020-01-13-100414.jpg', 0),
(20, 8, '2020-01-13-100902.jpg', 1),
(21, 9, '2020-01-13-101115.jpg', 1),
(22, 10, '2020-01-13-102959.jpg', 1),
(23, 11, '2020-01-13-103554.jpg', 1),
(24, 12, '2020-01-13-103848.jpg', 1),
(25, 13, '2020-01-13-104416.jpg', 1),
(26, 14, '2020-01-13-104807.jpg', 1),
(27, 15, '2020-01-13-105823.jpg', 1),
(28, 16, '2020-01-13-110342.jpg', 1),
(29, 17, '2020-01-13-110807.jpg', 1),
(30, 17, '2020-01-13-110813.jpg', 0),
(31, 17, '2020-01-13-110819.jpg', 0),
(32, 17, '2020-01-13-110825.jpg', 0),
(33, 18, '2020-01-13-111445.jpg', 1),
(34, 18, '2020-01-13-111451.jpg', 0),
(35, 18, '2020-01-13-111459.jpg', 0),
(36, 18, '2020-01-13-111507.jpg', 0),
(37, 18, '2020-01-13-111515.jpg', 0),
(38, 19, '2020-01-13-111904.jpg', 1),
(39, 19, '2020-01-13-111910.jpg', 0),
(40, 19, '2020-01-13-111916.jpg', 0),
(41, 19, '2020-01-13-111922.jpg', 0),
(42, 19, '2020-01-13-111928.jpg', 0),
(43, 20, '2020-01-13-112513.jpg', 1),
(44, 20, '2020-01-13-112520.jpg', 0),
(45, 20, '2020-01-13-112526.jpg', 0),
(46, 20, '2020-01-13-112541.jpg', 0),
(47, 20, '2020-01-13-112547.jpg', 0),
(48, 21, '2020-01-13-121004.jpg', 1),
(49, 21, '2020-01-13-121013.jpg', 0),
(50, 21, '2020-01-13-121019.jpg', 0),
(51, 21, '2020-01-13-121028.jpg', 0),
(52, 21, '2020-01-13-121034.jpg', 0),
(53, 22, '2020-01-13-121557.jpg', 1),
(54, 22, '2020-01-13-121608.jpg', 0),
(55, 22, '2020-01-13-121621.jpg', 0),
(56, 22, '2020-01-13-121631.jpg', 0),
(57, 23, '2020-01-13-122257.jpg', 1),
(58, 24, '2020-01-13-123034.jpg', 1),
(59, 24, '2020-01-13-123046.jpg', 0),
(60, 25, '2020-01-13-123329.jpg', 1),
(61, 26, '2020-01-13-123636.jpg', 1),
(62, 26, '2020-01-13-123648.jpg', 0),
(63, 27, '2020-01-13-124356.jpg', 1),
(64, 27, '2020-01-13-124404.jpg', 0),
(65, 27, '2020-01-13-124417.jpg', 0),
(66, 27, '2020-01-13-124423.jpg', 0),
(67, 27, '2020-01-13-124430.jpg', 0),
(68, 28, '2020-01-13-124947.jpg', 1),
(69, 28, '2020-01-13-124953.jpg', 0),
(70, 28, '2020-01-13-125000.jpg', 0),
(71, 28, '2020-01-13-125006.jpg', 0),
(72, 28, '2020-01-13-125013.jpg', 0),
(73, 28, '2020-01-13-125019.jpg', 0),
(74, 29, '2020-01-13-125311.jpg', 1),
(75, 29, '2020-01-13-125317.jpg', 0),
(76, 29, '2020-01-13-125330.jpg', 0),
(77, 29, '2020-01-13-125338.jpg', 0),
(78, 29, '2020-01-13-125348.jpg', 0),
(79, 29, '2020-01-13-125355.jpg', 0),
(80, 30, '2020-01-13-125645.jpg', 1),
(81, 30, '2020-01-13-125653.jpg', 0),
(82, 30, '2020-01-13-125712.jpg', 0),
(83, 30, '2020-01-13-125720.jpg', 0),
(84, 31, '2020-01-13-010046.jpg', 1),
(85, 32, '2020-01-13-030659.jpg', 1),
(86, 32, '2020-01-13-030706.jpg', 0),
(87, 32, '2020-01-13-030716.jpg', 0),
(88, 32, '2020-01-13-030723.jpg', 0),
(89, 32, '2020-01-13-030730.jpg', 0),
(90, 33, '2020-01-13-031056.jpg', 1),
(91, 34, '2020-01-13-031304.jpg', 1),
(92, 35, '2020-01-13-031535.png', 1),
(93, 35, '2020-01-13-031543.jpg', 0),
(94, 35, '2020-01-13-031548.jpg', 0),
(95, 35, '2020-01-13-031555.jpg', 0),
(96, 36, '2020-01-13-031807.jpg', 1),
(97, 37, '2020-01-13-032221.jpg', 1),
(98, 38, '2020-01-13-032338.jpg', 1),
(99, 39, '2020-01-13-032457.jpg', 1),
(100, 40, '2020-01-13-032659.jpg', 1),
(101, 41, '2020-01-13-032801.jpg', 1);

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`id_produto`, `id_categoria`, `nome`, `descricao`, `slug`) VALUES
(1, 10, 'MISTURADOR HORIZONTAL MT - 50K', 'Características:\r\n\r\n-- Equipamento utilizado na mistura de produtos da indústria plástica e na fabricação de ração animal;\r\n\r\n-- Fácil Manutenção\r\n\r\n-- Possível troca de tambores para diferentes tipos de produtos\r\n\r\n-- Potência: 0,5CV - 4P\r\n\r\n-- Capacidade: 75 kg/batelada', 'misturador-horizontal-mt-50k'),
(2, 10, 'MISTURADOR VERTICAL MV - 250K', 'Características:\r\n\r\nEquipamento utilizado na mistura de pigmentos, masterbatchs, resinas, termoplásticos, etc.\r\n\r\n-- Mistura através de helicoide\r\n\r\n-- Fácil operação e manutenção\r\n\r\n-- Modelo: MV 250K\r\n\r\n-- Potência: 3CV - 4 Pólos\r\n\r\n-- Voltagem: 220/380V\r\n\r\n-- Alimentação: Manual\r\n\r\n-- Painel: IP55\r\n\r\n-- Produção: 250 Kg/batelad', 'misturador-vertical-mv-250k'),
(3, 9, 'MOINHO MBR - 1,5', 'MOINHO MBR - 1,5 \r\nCaracterísticas:\r\n--- Ideal para implantação junto ao processo de injeção para minimizar custo de moagem;\r\n--- Alimentação manual;\r\n--- Cabine de proteção acústica;\r\n--- Capacidade: 40 kg/h em PEBD Compacto\r\n--- Potencia: 1,5 CV-8P\r\n--- Boca de alimentação: 220x220\r\n--- Quantidade de facas: 2 Fixas / 3 Rotativas\r\n--- Recomendado para: galhos produtos de injeção; pequenas peças compactas de PEBD, PVC, etc.\r\n--- Não recomendado para PET.', 'moinho-mbr-15'),
(4, 9, 'MOINHO MR - 150 - R', 'MOINHO 5 CV\r\nCaracterísticas:\r\n \r\n--- Alta produtividade;\r\n--- Baixo custo de manutenção;\r\n--- Baixo consumo de energia;\r\n--- Caixa bipartida facilitando o acesso ao rotor, facas fizas e peneiras, facilitando sua manutenção e limpeza.\r\n--- Potência: 5 CV - 4P\r\n--- Capacidade: 150kg/h em PEBD Compacto\r\n--- Boca de alimentação: 320x230\r\n--- Quantidade de facas: 2 Fixas / 3 Rotativas.\r\n--- Recomendado para: galhos produtos para injeção: pequenas peças compactas de PEBD, PVC, etc.\r\n--- Não recomendado para PET.', 'moinho-mr-150-r'),
(5, 9, 'MOINHO MR - 450 - R', 'MOINHO 10CV\r\n\r\nCaracterísticas:\r\n\r\n- Alta produtividade;\r\n\r\n- Baixo custo de manutenção;\r\n\r\n- Baixo consumo de energia;\r\n\r\n- Caixa bipartida facilitando o acesso ao rotor, facas dixas e peneiras, facilitando sua manutenção e limpeza;\r\n\r\n- Potência: 10CV-4P\r\n\r\n- Capacidade: 450kg/h em PEBD Compacto\r\n\r\n- Boca de alimentação: 330 x 230\r\n\r\n- Quantidade de facas: 2 Fixas / 6 Rotativas\r\n\r\n- Recomendado para: galhos produtos de injeção, pequenas peças compactas de PEBD, PVC, etc.\r\n\r\n- Não recomendado para PET.', 'moinho-mr-450-r'),
(6, 9, 'MOINHO MR - 600 - R', 'MOINHO 12,5 CV\r\n\r\nCaracterísticas:\r\n\r\n- Alta produtividade;\r\n\r\n- Baixo custo de manutenção;\r\n\r\n- Baixo consumo de energia;\r\n\r\n- Caixa bipartida facilitando o acesso ao rotor, facas fixas e peneiras, facilitando sua manutenção e limpeza;\r\n\r\n- Potência: 12,5 CV-4P\r\n\r\n- Capacidade: 600kg/h em PEBD Compacto\r\n\r\n- Boca de alimentação: 395x400\r\n\r\n- Quantidade de facas: 2 Fixas / 6 rotativas\r\n\r\n- Recomendado para: galhos produtos de injeção; pequenas peças compactas de PEBD, PVC, \r\n\r\n- Não recomendado para PET.', 'moinho-mr-600-r'),
(7, 9, 'TRANSPORTADOR PNEUMÁTICO EX-150', 'Transportador Pneumático EX-150\r\n\r\n Características: \r\n\r\n- Ideal para transporte de granulado da gaveta do moinho para o silo de ensaque\r\n\r\n- Contém sistema de fixação dos sacos no processo de enchimento.\r\n\r\n- Registro de fechamento de alimentação do processo de ensaque para toca de sacos.\r\n\r\n- Capacidade similar ao do moinho que está trabalhando.\r\n\r\n- Potência 3 CV', 'transportador-pneumatico-ex-150'),
(8, 9, 'MOINHO MR-150-BR', 'MOINHO 5 CV - BAIXA ROTAÇÃO\r\n\r\nCaracterísticas:\r\n\r\n--- Alta produtividade;\r\n--- Baixo custo de manutenção;\r\n--- Baixo consumo de energia;\r\n--- Caixa bipartida facilitando o acesso ao rotor, facas fixas e peneiras, facilitando sua manutenção e limpeza;\r\n--- Potência: 5 CV-8P\r\n--- Capacidade: 40kg/h em PEBD Compacto\r\n--- Boca de Alimentação: 210x200\r\n--- Quantidade de Facas: 2 Fixas / 3 Rotativas\r\n--- Recomendado para: galhos produtos de injeção; pequenas peças compactas de PEBD, PVC, etc.\r\n--- Não recomendo para PET.', 'moinho-mr-150-br'),
(9, 9, 'MOINHO MR-550-R', 'MOINHO 10 CV - INTERMEDIÁRIO \r\n\r\nCaracterísticas:\r\n\r\n--- Alta produtividade;\r\n--- Baixo custo de manutenção;\r\n--- Baixo consumo de energia;\r\n--- Caixa bipartida facilitando o acesso ao rotor, facas fixas e peneiras, facilitando sua manutenção e limpeza;\r\n--- Potência: 10 CV-4P\r\n--- Capacidade: 550kg/h em PEBD Compacto\r\n--- Boca de Alimentação: 320 x 300\r\n--- Quantidade de Facas: 2 Fixas / 6 Rotativas\r\n--- Recomendado para: galhos produtos de injeção; pequenas peças compactas de PEBD, PVC, etc.\r\n--- Não recomendo para PET.', 'moinho-mr-550-r'),
(10, 8, 'CYCLOFAN', 'O Cyclofan é um produto único e patenteado. Compacto, ele combina um poderoso exaustor com um mini-cyclone de alta performance.\r\n\r\nTestado em centenas de indústrias em todo mundo, operando 365/7/24 nas mais diversas condições climáticas.\r\nA melhor performance de aspiração de pó do mercado, com reduzido consumo de energia.\r\nMelhora de forma significativa o ambiente, reduzindo riscos trabalhistas à indústria.', 'cyclofan'),
(11, 8, 'SELECIONADORA ELETRÔNICA', 'Linha SEA Chrome: disponível com 1 a 7 bandejas, câmeras CCD RGB, InGaAS e NIR. É a selecionadora eletrônica tricromática com funcionamento por bandejas de maior capacidade do mercado.\r\nLinha SEA NEXT: disponível com 1 a 7 bandejas, versões monocromática e bicromática, InGaAs, NIR e UV.\r\nLinha SEA PIXEL: disponível com 1 a 5 bandejas, versões monocromática NIR e UV', 'selecionadora-eletronica'),
(12, 8, 'MESA DENSIMÉTRICA', 'Moega com sistema de alimentação eletromagnético e vibratório, garantindo melhor controle de fluxo das sementes e operação da mesa sempre cheia.\r\nPinos de estratificação realizam a separação mecânica das sementes.\r\nDeck com desenho exclusivo retém as sementes por mais tempo, permitindo uma classificação ainda mais precisa.\r\nSistema de alavancas individuais controla as turbinas em cada segmento da mesa.\r\nDisponível com sistema de aspiração e cobertura parcial ou total do deck, eliminando até 80% da poeira.\r\nCapacidade: 0,1 (lab) a 15 t/h\r\nPotência: 1,87 a 16,1 kw\r\nConsumo de ar 37 (lab) a 550 m3/min', 'mesa-densimetrica'),
(13, 8, 'TRIEUR – INDENT CYLINDER SEPARATOR', 'Utilizado para realizar uma eficiente separação de grãos por comprimento.\r\nO cilindro de separação possui design exclusivo de alta performance, abrigando um maior número de alvéolos por cm2.\r\nDispõem de cobertura totalmente fechada, mas quando necessário pode ser aberta para fácil manutenção dos segmentos do cilindro.\r\nFuncionamento através de motoredutores que oferecem uma operação mais suave, reduzindo a manutenção e os riscos de falha.\r\nSistema de vedação evita que grãos não desejados passem do cilindro para o cocho, garantindo maior precisão na separação.\r\nCapacidade: 0,1 (lab) a 16,0 t/h\r\nPotência: 0,37 (lab) a 4,0 kw', 'trieur-indent-cylinder-separator'),
(14, 8, 'CLASSIFICADORA DELTA GRADER', 'A série Delta 120 foi desenvolvida especialmente para conferir uma classificação altamente precisa de uma ampla variedade de sementes.\r\n\r\nO funcionamento é semelhante ao detalhado nas máquinas de pré-limpeza, variando o tipo de peneiras e sua inclinação na máquina. As Deltas 120 não utilizam pré ou pós-aspiração.\r\n \r\nDa mesma forma que na pré-limpeza, a qualidade dos componentes da máquina é excepcionalmente alta.\r\n \r\nCapacidade: 0,04 (lab) a 25,0 t/h\r\n \r\nÁrea de Peneira: 0,96 (lab) a 24 m2\r\n\r\nPotência: 1,47 (lab) a 6,7 kw', 'classificadora-delta-grader'),
(15, 8, 'SEPARADOR DE PEDRAS – TS DRY STONER', 'Exclusivo sistema de balanceamento que reduz oscilações e permite a instalação em plataformas.\r\nDesign avançado e com janelas de inspeção amplas.\r\nSaída dos grãos é protegida por uma zona de contra-fluxo de ar, impedindo a passagem de pedras.\r\nDisponível com um sistema opcional de recirculação de ar, reduzindo consumo de energia e necessitando de menor espaço para instalação\r\nCapacidade: 5 a 20t/h\r\nPotência: 0,37 a 1,10 kw', 'separador-de-pedras-ts-dry-stoner'),
(16, 8, 'DELTA SUPER CLEANER E FINE CLEANER', 'Peneiras dispostas em formato de “Z” conferem excelente performance com menor utilização de área.\r\nO sistema vibratório de alimentação despeja as sementes igualmente por toda a largura das peneiras.\r\nFunção de pré e pós-aspiração elimina grande parte da poeira e resíduos leves.\r\nAs caixas das peneiras são feitas em placas de bétula altamente duráveis, flexíveis e mais resistentes ao movimento constante no equipamento.\r\nSistema excêntrico desenhado para assegurar a operação suave das peneiras, com pêndulos que recapturam a força do movimento e reduzem o consumo de energia.\r\nCapacidade: 0,04 (lab) a 25 t/h\r\nÁrea de Peneira: 0,96 (lab) a 24m2\r\nPotência: 1,47 (lab) a 6,7 kw', 'delta-super-cleaner-e-fine-cleaner'),
(17, 6, 'ARKTOS 2005 DP', 'Tratamento de Sementes On Farm com o máximo de precisão na dosagem.\r\nCom sistema duplo de aplicação e regulagem digital você consegue o máximo de qualidade e desempenho neste Moldeo.\r\nAtravés da bomba dosadora Watson Marlow ou através de sistema de copos dosadores, a regulagem do equipamento fica muito mais simples e eficiente.\r\nSua rosca helicoidal promovem segurança e cuidado com suas sementes sendo um dos diferenciais deste equipamento.', 'arktos-2005-dp'),
(18, 6, 'ARKTOS 2005 DC', 'Tratamento de Sementes On Farm agora pode ser preciso e eficiente.\r\nCom sistema duplo de aplicação de líquidos e regulagem digital, você consegue o máximo de qualidade e desempenho neste Modelo, além do dosador de pó integrado ao sistema.\r\nCom motor independente o sistema de copos dosadores, a regulagem do equipamento fica muito mais simples e eficiente.\r\nSua rosca helicoidal promovem segurança e cuidado com suas sementes sendo um dos diferenciais deste equipamento que proporciona uma homogenização perfeita. ', 'arktos-2005-dc'),
(19, 6, 'ARKTOS L-5K', 'ARKTOS L-5K', 'arktos-l-5k'),
(20, 6, 'ARKTOS BHICA 1D', 'ARKTOS BHICA 1D', 'arktos-bhica-1d'),
(21, 6, 'SEED MIX VHM 4/10T OF', 'Equipamento versátil que se adapta tanto no ambiente Industrial quanto no Campo.\r\nSeu sistema de aplicação através de Atomizador com dosagem através de bomba peristáltica Watson Marlow, regulagem digital , é capaz de tratar 10.000 kg/h - Soja com muita qualidade, precisão e eficiência.\r\nMaquina construída em Aço Inox que acompanha seu tanque dosador de 150 Lts com agitador. O sistema de dosagem de Pó, também com regulagem digital, é capaz de proporcionar uma excelente cobertura e precisão no volume aplicado.\r\nQuer capacidade e qualidade Industrial em qualquer ambiente, então você precisa de uma SEED MIX VHM 4/10 ', 'seed-mix-vhm-410t-of'),
(22, 6, 'ARKTOS AFRICA', 'A ARKTOS AFRICA é uma máquina de tratamentos de sementes por lote.\r\n\r\nIdeal para uso em laboratório ou tratamento de sementes na propriedade, tem capacidade de tratamento de 10 a 20 kg por batelada.          \r\n\r\nA máquina ARKTOS AFRICA pode tratar sementes de soja, trigo, algodão, girassol, milho, amendoin, sorgo, cevada, forrageira.\r\n\r\nO abastecimento de sementes, dosagem de calda e descarga de sementes é manual, permitindo um melhor controle dos volumes de sementes abastecidos e tratados e do tempo de dosagem via seringa no atomizador da máquina e tempo de batida das sementes no bowl após aplicação com o suporte de um temporizador ajustado conforme a necessidade da semente e receita.\r\n\r\nÉ possível realizar a dosagem automática acoplando uma unidade dosadora, consulte nossos vendedores a respeito!\r\n\r\nDisponível em 220 V monofásica.', 'arktos-africa'),
(23, 6, 'ARKTOS AFRICA L40K', 'A ARKTOS AFRICA é uma máquina de tratamentos de sementes por lote.\r\n\r\nIdeal para tratamento de sementes na propriedade ou para baixos volumes de tratamento, esta máquina tem capacidade de tratamento de 20 a 40 kg por batelada.\r\n\r\nA máquina ARKTOS AFRICA pode tratar sementes de soja, trigo, algodão, girassol, milho, amendoin, sorgo, cevada, forrageira.\r\n\r\nO abastecimento de sementes, dosagem de calda e descarga de sementes é manual, permitindo um melhor controle dos volumes de sementes abastecidos e tratados e do tempo de dosagem via seringa no atomizador da máquina e tempo de batida das sementes no bowl após aplicação com o suporte de um temporizador ajustado conforme a necessidade da semente e receita.\r\n\r\nÉ possível realizar a dosagem automática acoplando uma unidade dosadora, consulte nossos vendedores a respeito!\r\n\r\nDisponível em 220 V monofásica.', 'arktos-africa-l40k'),
(24, 6, 'TANQUE DOS 150L P. S/ CEL', 'O TANQUE DOS 150L P-S/CEL foi desenvolvido para acompanhar as máquinas on farm em caso de necessidade de incluir um tanque adicional para dosagens separadas ou um maior volume de aplicação de calda.\r\n\r\nA dosagem do TANQUE DOS 150L P-S/CEL é através de uma bomba peristáltica, que permite alcançar uma excelente precisão de dosagem e é de fácil manutenção.', 'tanque-dos-150l-p-s-cel'),
(25, 6, 'UNIDADE DOSADORA WM521', 'A UNIDADE DOSADORA WM521 foi desenvolvida para realizar a dosagem automáticas nas máquinas on farm e de laboratório. Ela possui um tanque dosador de 15L e um painel elétrico para controle da dosagem através de uma bomba peristáltica, que permite alcançar uma excelente precisão de dosagem e é de fácil manutenção.', 'unidade-dosadora-wm521'),
(26, 6, 'ARKTOS AFRICA L40K AUTOM. Dp', '1 - Moega da Máquina: Utilizada para abastecimento manual de sementes da máquina.\r\n\r\n2 – Bowl Tratador: composto por conjunto de centrifuga e bacia para o tratamento por batelada e um atomizador para aplicação de químicos e uma moega de descarga para saída da semente tratada;\r\n\r\n3 – Sistema Fechado de Aplicação de Produto: composto por um tanque de 15L e uma bomba peristáltica que fazem a dosagem do produto no Bowl Tratador\r\n\r\n4 – Dosador de Pó: Composto por um depósito de pó e uma rosca infinita para efetuar a dosagem do pó secante.\r\n\r\n5 – Painel Elétrico: Composto por vários disjuntores de proteção, CLP e Inversores entre outros componentes para operação da máquina. A injeção de químicos e pó secante é realizada automaticamente de acordo com a configuração inserida na IHM da máquina, esta injeção é controlada por um motor ou bomba controlado por um inversor de frequência.\r\n\r\n6 - Capacidade máx.(Soja) - 40Kg/Batelada', 'arktos-africa-l40k-autom-dp'),
(27, 4, 'SEED MIX VHM 4/10T OF IHM', 'SEED MIX VHM 4/10T OF IHM', 'seed-mix-vhm-410t-of-ihm'),
(28, 4, 'SEED MIX VHS 10T', 'A SEED MIX VHS 10T e trabalha com dois níveis de tratamento de sementes, o tratamento de sementes primário, em que a calda é injetada no atomizador para nebulizar o produto sobre as sementes na entrada destas e o tratamento secundário que acontece no tambor.\r\n\r\nO tambor da SEED MIX VHS 10T e tem a função de homogenizar as sementes durante o tratamento, permitindo uma melhor cobertura semente a semente e auxilia na secagem destas para o ensaque.\r\n\r\nDesenvolvida para o tratamento industrial de sementes, são diversos os periféricos que podem ser acoplados nesta máquina (tanques, estruturas, elevadores, etc.). Sua operação é semi automatizada e acontece através de um CLP com controle por uma IHM com tela touch screen capaz de se comunicar com todos os equipamentos do Centro de Tratamento Industrial de Sementes. Uma vez calibrada a semente e a calda, a dosagem acontece de forma automática, reduzindo a necessidade de intervenção do operador durante o processo.\r\n\r\nDisponível em 220/380 V trifásica.', 'seed-mix-vhs-10t'),
(29, 4, 'SEED MIX VHS 20T', 'A SEED MIX VHS 20T trabalha com dois níveis de tratamento de sementes, o tratamento de sementes primário, em que a calda é injetada no atomizador para nebulizar o produto sobre as sementes na entrada destas e o tratamento secundário que acontece no tambor.\r\n\r\nO tambor da SEED MIX VHS 20T tem a função de homogenizar as sementes durante o tratamento, permitindo uma melhor cobertura semente a semente e auxilia na secagem destas para o ensaque.\r\n\r\nDesenvolvida para o tratamento industrial de sementes, são diversos os periféricos que podem ser acoplados nesta máquina (tanques, estruturas, elevadores, etc.). Sua operação é semi automatizada e acontece através de um CLP com controle por uma IHM com tela touch screen capaz de se comunicar com todos os equipamentos do Centro de Tratamento Industrial de Sementes. Uma vez calibrada a semente e a calda, a dosagem acontece de forma automática, reduzindo a necessidade de intervenção do operador durante o processo.\r\n\r\nDisponível em 220/380 V trifásica.', 'seed-mix-vhs-20t'),
(30, 7, 'DOSADOR DE PÓ PARA SEED MIX VHS 10T E 20T', 'O DOSADOR DE PÓ VHS foi desenvolvido para dosagem de pó nas máquinas SEED MIX VHS 10T e 20T. Especialmente projetado para ser instalado em conjunto com esta máquina, pode ser adicionado ao sistema ou ser controlado manualmente por um painel auxiliar.\r\n\r\nSeu modelo varia em função do pó aplicado, podendo ser utilizado para pós secantes, grafite ou turfa.', 'dosador-de-po-para-seed-mix-vhs-10t-e-20t'),
(31, 4, 'TANQUE DOSADOR 150L', 'O TANQUE DOS 150L foi desenvolvido para acompanhar as máquinas on farm e de tratamento industrial, seu modelo pode ser adequado conforme a necessidade de trabalho de cada cliente, sendo possível incluir células de carga, sensores de nível para redundância, medidores de fluxo, etc.\r\n\r\nPara dosagem o TANQUE DOS 150L utiliza uma bomba peristáltica, que permite alcançar uma excelente precisão de dosagem e é de fácil manutenção.', 'tanque-dosador-150l'),
(32, 4, 'ESTEIRA DE PESAGEM EP500', 'Esteira de pesagem EP500 pesa o volume de sementes que é abastecido na maquina SEED MIX VHS 10 e 20T, on line durante o tratamento das sementes.', 'esteira-de-pesagem-ep500'),
(33, 4, 'TANQUE DOSADOR 300L HC', 'O TANQUE DOS 300L HC foi desenvolvido para dosagem de inoculantes com alta viscosidade, com possibilidade de dosagem de inoculantes turfosos devido a turbina que este tanque possui instalada.\r\n\r\nPara dosagem o TANQUE DOS 300L HC utiliza uma bomba peristáltica, que permite alcançar uma excelente precisão de dosagem e é de fácil manutenção.', 'tanque-dosador-300l-hc'),
(34, 4, 'TANQUE DOSADOR DE 1000L', 'O TANQUE DOS 1000L foi desenvolvido para acompanhar as máquinas de tratamento industrial em especial, no uso de salas de químico com preparo de mix automático, seu modelo pode ser adequado conforme a necessidade de trabalho de cada cliente, sendo possível incluir células de carga, sensores de nível para redundância, medidores de fluxo, etc.\r\n\r\nPara dosagem o TANQUE DOS 1000L utiliza uma bomba peristáltica, que permite alcançar uma excelente precisão de dosagem e é de fácil manutenção.', 'tanque-dosador-de-1000l'),
(35, 4, 'SISTEMA DE APLICAÇÃO IBC', 'Quando os produtos químicos são fornecidos em IBC e sua aplicação deve ser realizada individualmente, é possível utilizar um SISTEMA APLICAÇÃO IBC.\r\n\r\nO SISTEMA APLICAÇÃO IBC foi desenvolvido para incrementar o tratamento industrial, ele utiliza uma bomba pneumática para agitação e transferência da calda para o seu respectivo tanque dosador.\r\n\r\nCom uma base de contenção capaz de conter 1,3 vezes o volume de um IBC, este sistema permite uma segurança no ambiente de trabalho em caso de um possível vazamento, sendo possível drenar o conteúdo de derrame, caso ocorra uma acidente, conforme as normas regulamentadoras locais de cada cliente.', 'sistema-de-aplicacao-ibc'),
(36, 4, 'CENTRICOATER LINHA CC', 'Realiza o tratamento automatizado por batelada.\r\nProporciona uma melhor uniformidade de cobertura e aparência, semente a semente.\r\nVantagem de permitir o tratamento da semente sobre camadas.\r\nDisponível em modelos com diferentes capacidades de tratamento.\r\nSistema de balança que regula a calda em função do volume de sementes a ser tratado.\r\nUnidades dosadoras podem ser mássicas, volumétricas ou diretas, garantindo excelente precisão de dosagem.\r\nPodem ser inclusos até dois dosadores de pó.\r\nTambor pode ser ajustado para sementes sensíveis a danos mecânicos.\r\nCapacidade: de 1.2 a 50t/h\r\nTamanho da Batelada: de 2kg (Lab) a 2x250kg (Indústria)\r\nPotência: de 7,5 a 35,0 Kw', 'centricoater-linha-cc'),
(37, 3, 'CTS CC250 ST', 'CTS VHS10T –SD: Centro de Tratamento de Sementes para Tratamento Industrial com capacidade de 10T/h com dosagem direta de 5 produtos, sendo 4 através de IBC’s e 1 a partir de um tanque de preparo de mix manual, incluso sistema de dosagem para inoculante com alta viscosidade. Periféricos de instalação dos equipamentos para tratamento (estruturas), transporte de sementes (moegas e elevadores), ensaque (silos de ensaque e ensacadeiras) e exaustão inclusos.', 'cts-cc250-st'),
(38, 3, 'CTS CC250 SOLO ST', 'CTS VHS10T –SD: Centro de Tratamento de Sementes para Tratamento Industrial com capacidade de 10T/h com dosagem direta de 5 produtos, sendo 4 através de IBC’s e 1 a partir de um tanque de preparo de mix manual, incluso sistema de dosagem para inoculante com alta viscosidade. Periféricos de instalação dos equipamentos para tratamento (estruturas), transporte de sementes (moegas e elevadores), ensaque (silos de ensaque e ensacadeiras) e exaustão inclusos', 'cts-cc250-solo-st'),
(39, 3, 'CTS VHS 10T AUTO SD', 'CTS VHS10T –SD: Centro de Tratamento de Sementes para Tratamento Industrial com capacidade de 10T/h com dosagem direta de 5 produtos, sendo 4 através de IBC’s e 1 a partir de um tanque de preparo de mix manual, incluso sistema de dosagem para inoculante com alta viscosidade. Periféricos de instalação dos equipamentos para tratamento (estruturas), transporte de sementes (moegas e elevadores), ensaque (silos de ensaque e ensacadeiras) e exaustão inclusos.', 'cts-vhs-10t-auto-sd'),
(40, 3, 'CTS VHS 20T AUTO ST', 'CTS VHS10T –SD: Centro de Tratamento de Sementes para Tratamento Industrial com capacidade de 10T/h com dosagem direta de 5 produtos, sendo 4 através de IBC’s e 1 a partir de um tanque de preparo de mix manual, incluso sistema de dosagem para inoculante com alta viscosidade. Periféricos de instalação dos equipamentos para tratamento (estruturas), transporte de sementes (moegas e elevadores), ensaque (silos de ensaque e ensacadeiras) e exaustão inclusos.', 'cts-vhs-20t-auto-st'),
(41, 3, 'CTS VHS 20T DUPLEX AUTO ST', 'CTS VHS10T –SD: Centro de Tratamento de Sementes para Tratamento Industrial com capacidade de 10T/h com dosagem direta de 5 produtos, sendo 4 através de IBC’s e 1 a partir de um tanque de preparo de mix manual, incluso sistema de dosagem para inoculante com alta viscosidade. Periféricos de instalação dos equipamentos para tratamento (estruturas), transporte de sementes (moegas e elevadores), ensaque (silos de ensaque e ensacadeiras) e exaustão inclusos.', 'cts-vhs-20t-duplex-auto-st');

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nome`, `email`, `senha`) VALUES
(1, 'Edilson Pereira', 'edilson@desigual.com.br', '202cb962ac59075b964b07152d234b70');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
