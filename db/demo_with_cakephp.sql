-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-02-2025 a las 03:22:48
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `demo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `courses`
--

CREATE TABLE `courses` (
  `id` binary(16) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `is_enabled` tinyint(4) NOT NULL,
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `delete_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `courses`
--

INSERT INTO `courses` (`id`, `name`, `description`, `start_date`, `end_date`, `is_enabled`, `create_at`, `delete_at`) VALUES
(0x047cb6d973594acb9d6ac550ecc7da39, 'Curso de Python', 'Dolor placeat fugit ut est officia eveniet omnis. Perferendis rerum nulla pariatur amet rerum animi repellat. Officia ducimus omnis voluptatem magni. Eius aut magnam nostrum ut.', NULL, NULL, 1, '2024-10-12 08:14:32', NULL),
(0x116d8117f72b48bd898b8dbf0027785e, 'Desarrollo con CakePHP', 'Un gran desarrollo', '2025-03-01 00:00:00', '2025-06-30 00:00:00', 1, '2025-02-12 23:40:48', NULL),
(0x3578d155bda9469b8566847361332403, 'Voluptatum non inventore qui quidem.', 'Et non excepturi eos ut. Commodi voluptatum eaque nobis laboriosam dolorem placeat. Tenetur voluptate omnis delectus aut libero reiciendis eaque.', NULL, NULL, 0, '2023-02-19 14:14:24', NULL),
(0x39483d6ef19c45868585f4a3342fd04c, 'Desarrollo Web', 'Sed eligendi sed excepturi quo adipisci quas vitae recusandae. Eum quia aut similique est magnam. Voluptate nam eum quis perspiciatis. Modi est est nulla. Est aperiam voluptatem et. Non aut et et est dolorem autem.', NULL, NULL, 1, '1972-05-16 20:18:09', NULL),
(0x5c84ee45af2e4e50b2f093d7dceab509, 'Base de datos', 'Vel est est rem. Libero voluptate in adipisci iure totam recusandae enim. Distinctio quisquam illo adipisci quibusdam maiores. Laborum nemo quisquam asperiores sunt quibusdam magnam blanditiis. Voluptates voluptatem a odio autem.', '2025-03-01 00:00:00', '2025-08-31 00:00:00', 1, '1979-06-16 23:23:49', NULL),
(0x7560ec28c6c94f72a4ef2ab003b999ed, 'Nobis ipsum eveniet ut.', 'Quis nobis officia qui nobis dolores. Consequuntur dolorem est accusantium recusandae fuga aliquid. Odit voluptatem at sint sunt. Sed aperiam dolore repellendus molestiae. Quod neque delectus ut deserunt.', NULL, NULL, 1, '1998-11-11 12:43:17', NULL),
(0x7f60b2be8a144c5eb4e5b8fe7a3869d3, 'Ciberseguridad', 'Ullam tempore quia ex ut et nesciunt. Ipsam perferendis officia eaque veniam voluptas. Qui numquam sequi ut autem rem odit. Dolorem aut consequatur maxime voluptas quia.', NULL, NULL, 1, '1999-02-11 07:36:15', NULL),
(0x8ad01a675dd046b0a53bcacf73ddb876, 'Dolores fugiat delectus qui iure rerum.', 'Quam ut et tenetur delectus iusto. Omnis enim delectus assumenda quia. Exercitationem molestias ipsam beatae dolores deleniti. Enim quia quo quisquam ratione quibusdam quia est. Facere magni eum suscipit eos sed quos. Ratione et mollitia deserunt est dolor adipisci.', NULL, NULL, 1, '2005-05-03 01:19:44', NULL),
(0x95d38fbc40be4226938be4f19aa27c77, 'Explicabo harum exercitationem.', 'Ut pariatur illo est consequatur. Alias est porro autem perspiciatis facilis magni. Veniam et fuga mollitia eum. Quam incidunt inventore non ad vel. Molestiae est ea quia necessitatibus.', NULL, NULL, 0, '2015-01-31 23:02:31', NULL),
(0xa5cf7e2cebdd47819ba95f2b67204c5a, 'Hic deserunt recusandae.', 'Sed aspernatur dicta ut quia nulla quaerat sunt. Quia sed aspernatur et rerum. Voluptate ab officia eaque ea quis ut natus. Dolor odio qui dolor vel explicabo. Perferendis suscipit et cupiditate ducimus.', NULL, NULL, 0, '2022-01-27 14:24:28', '2025-02-12 20:59:21'),
(0xb15bd91d1e7e42ef9a9c37a16377514e, 'Qui illum totam.', 'Fugit fuga omnis ex nam itaque magnam. Dolorem ratione aut ea. Molestias nihil sit est minima assumenda voluptas. Necessitatibus molestiae dicta officia sequi. Voluptatum eveniet aperiam sunt labore unde cum. Et fugiat et quibusdam saepe et.', NULL, NULL, 0, '1977-10-05 06:00:25', NULL),
(0xc30f89ddf7934b55978a6e02cd2098d2, 'Comercio exterior', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2025-03-03 00:00:00', '2025-07-31 00:00:00', 0, '2025-02-11 22:18:12', '2025-02-11 20:26:18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `enrollments`
--

CREATE TABLE `enrollments` (
  `id` binary(16) NOT NULL,
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `user_id` binary(16) NOT NULL,
  `course_id` binary(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `enrollments`
--

INSERT INTO `enrollments` (`id`, `create_at`, `user_id`, `course_id`) VALUES
(0x2d0d85883f9d42e097e48f48b70732a1, '2025-02-12 09:58:38', 0x08b3e019991542e59b15f1a5ebb95f6b, 0x047cb6d973594acb9d6ac550ecc7da39),
(0xa2f199ff2cd34fc89668cb81d2be4f97, '2025-02-12 10:17:24', 0x34fe14befaff44269a887755aad57b90, 0x047cb6d973594acb9d6ac550ecc7da39),
(0xc3e9eafd0162435c85e31a6667d9e1ce, '2025-02-12 11:00:40', 0x0c8a133e0b814542b2f4263d0ce4846a, 0x047cb6d973594acb9d6ac550ecc7da39);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `phinxlog`
--

CREATE TABLE `phinxlog` (
  `version` bigint(20) NOT NULL,
  `migration_name` varchar(100) DEFAULT NULL,
  `start_time` timestamp NULL DEFAULT NULL,
  `end_time` timestamp NULL DEFAULT NULL,
  `breakpoint` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `phinxlog`
--

INSERT INTO `phinxlog` (`version`, `migration_name`, `start_time`, `end_time`, `breakpoint`) VALUES
(20250210232435, 'CreateDataSeedMigration', '2025-02-10 23:39:05', '2025-02-10 23:39:15', 0),
(20250210234613, 'CreateCoursesDataSeedMigration', '2025-02-11 02:57:54', '2025-02-11 02:57:55', 0),
(20250211000135, 'AddDataUsers', '2025-02-11 00:06:08', '2025-02-11 00:06:16', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` binary(16) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(0x43a419ad718d4f5d893b89829d8a2142, 'ADMIN'),
(0x4c147c06596a41bcb8a50e48da969b59, 'USER');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` binary(16) NOT NULL,
  `name` varchar(100) NOT NULL,
  `paternal_last_name` varchar(50) NOT NULL,
  `maternal_last_name` varchar(50) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_active` tinyint(4) NOT NULL,
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `update_at` datetime DEFAULT NULL,
  `delete_at` datetime DEFAULT NULL,
  `role_id` binary(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `paternal_last_name`, `maternal_last_name`, `email`, `password`, `is_active`, `create_at`, `update_at`, `delete_at`, `role_id`) VALUES
(0x00c552048dfb4656b63e068b68d261bd, 'Peggie', 'Marvin', 'Bergstrom', 'glubowitz@example.org', '$2y$10$EjCjEZQ2EnLmS1JXcm6ADufqAdyYY1iXgs5VLinUiYVk4.dL4GCTG', 1, '2025-02-10 21:06:14', NULL, NULL, 0x4c147c06596a41bcb8a50e48da969b59),
(0x00c9b186f61a4618970f1b6918cf58ef, 'Elise', 'Prohaska', 'Herman', 'janiya73@example.org', '$2y$10$yYL1EjwVy97hOtJpK9YZXuNB45RP6zZYA8ShcD1HuJ46i1j5UICpa', 1, '2025-02-10 21:06:16', NULL, NULL, 0x4c147c06596a41bcb8a50e48da969b59),
(0x024dfc4b3e1b47bc8807059e28dff36a, 'Timothy', 'Muller', 'Yost', 'hgoyette@example.org', '$2y$10$0vc0I6WohR9EjPL9T8oDtOHo2rLS4R.gCXFLUkvkqwOuR1nO45Kka', 0, '2025-02-10 21:06:09', NULL, NULL, 0x4c147c06596a41bcb8a50e48da969b59),
(0x0266163778de4bfaac835bb5e150cf2d, 'Ariel', 'Grant', 'Bartoletti', 'okuneva.seth@example.org', '$2y$10$h15jn1tKUqmiN1hGjCrzE.5TYQMG6BU4.dMH2zxrV5DciUS87SIGW', 1, '2025-02-10 21:06:09', NULL, NULL, 0x4c147c06596a41bcb8a50e48da969b59),
(0x038d0bea058b4aeaa96e9e12a0fac5d2, 'Kendra', 'Lang', 'Corkery', 'addison.effertz@example.org', '$2y$10$mpRdsODMt2X4YGw/RbUSUuZC6CjnC0TpF5z/DOCxCEDQvnHPcHsPe', 1, '2025-02-10 21:06:15', NULL, NULL, 0x4c147c06596a41bcb8a50e48da969b59),
(0x04805859a7c2428cb802b2ca485ffd0c, 'Darrin', 'Jacobi', 'Kshlerin', 'glegros@example.com', '$2y$10$J0oR3upOc8AS7KJvKDQFwOkjr37WJ80e5AIWJCmBpDe7R4t42yC4q', 1, '2025-02-10 21:06:10', NULL, NULL, 0x4c147c06596a41bcb8a50e48da969b59),
(0x04835a02da1f4db8a98b04497af0832b, 'Brett', 'Torphy', 'Mueller', 'cormier.eulalia@example.org', '$2y$10$vavXfIz2m6XrVB9ht0vKj.VJVHjZbhEHDNMrANxXEDdNTQZ.T9nYS', 0, '2025-02-10 21:06:14', NULL, NULL, 0x4c147c06596a41bcb8a50e48da969b59),
(0x06797273b40e4187b629d3c68f68fca6, 'aaa', 'aaaa', 'aaaa', 'a@fake.com', '$2y$10$VB.Wd7Yxy1QJ6hUHGfGs/OcLXTwbX5oMTCKwGuZ9EqbBRlv8TpE5G', 0, '2025-02-12 23:39:18', NULL, '2025-02-12 20:54:04', 0x4c147c06596a41bcb8a50e48da969b59),
(0x08b3e019991542e59b15f1a5ebb95f6b, 'Carolina', 'Pouros', 'Boehm', 'cristina64@example.net', '$2y$10$Utyw1ykaDhvMogEHoCPh6.GEjA0gmvWNGavVbosdv13251exi7nfm', 1, '2025-02-10 21:06:11', NULL, NULL, 0x4c147c06596a41bcb8a50e48da969b59),
(0x0abaeacb55dc49cebfb94c98408a7a3c, 'Jody', 'Corkery', 'Goyette', 'hwaters@example.org', '$2y$10$o1wcvHWtCU6gMlC4GVemn.eVnfpkxp60esBuSqARlgDl1tXSzn2Fq', 1, '2025-02-10 21:06:13', NULL, NULL, 0x4c147c06596a41bcb8a50e48da969b59),
(0x0c8a133e0b814542b2f4263d0ce4846a, 'Gilbert', 'Smitham', 'Kessler', 'oromaguera@example.net', '$2y$10$d6v4Z0ekohKrtSlWLjUdEOmaddGmnI0WzU7Z7qsTNHHgRrCfx6Q72', 0, '2025-02-10 21:06:11', NULL, NULL, 0x43a419ad718d4f5d893b89829d8a2142),
(0x0d422c0c6c6f47fc966634ceca941db7, 'Korey', 'Pacocha', 'Towne', 'rowe.chase@example.com', '$2y$10$V6Wuj.Ld1yO/Oq1jpVVOOO0s1Ttnq13VP3f2aY6m8ccGqGWOIiulu', 1, '2025-02-10 21:06:14', NULL, NULL, 0x43a419ad718d4f5d893b89829d8a2142),
(0x0d4ce30a44944c64b079bc11c58ecca9, 'Brent', 'Orn', 'Raynor', 'frippin@example.com', '$2y$10$jqcdcQsG2tTRnXOPPSab.O/OZgDl45xwBqUS2Hwffc10crmj1HLwO', 0, '2025-02-10 21:06:09', NULL, NULL, 0x4c147c06596a41bcb8a50e48da969b59),
(0x13edc2badef1409c9e3671eb781e3c06, 'Germaine', 'Witting', 'Howe', 'shanelle.denesik@example.com', '$2y$10$OQCAFFdGqv/0siDLM6LemusFhZ1BTD/FtCLkMmla5doZVE85fC0.y', 1, '2025-02-10 21:06:10', NULL, NULL, 0x4c147c06596a41bcb8a50e48da969b59),
(0x16149879837c4acdad33015987c38b46, 'Deja', 'Graham', 'Conn', 'jgorczany@example.net', '$2y$10$y2CwqmRwzILWm59C1KgX4OkIPuegPltP0jSCG7Tu0QLtJki6RxtRi', 1, '2025-02-10 21:06:15', NULL, NULL, 0x4c147c06596a41bcb8a50e48da969b59),
(0x180ec2157c624d45a8468dafb8be73af, 'Ellen', 'Weimann', 'Romaguera', 'tamia26@example.com', '$2y$10$npayjSKM49FgGM94dvHXF.OP9HWbPsQoLa935fBFxqyPpd5zIG23G', 0, '2025-02-10 21:06:11', NULL, NULL, 0x4c147c06596a41bcb8a50e48da969b59),
(0x18b5dce5e15241ed85852a005a618d78, 'Gordon', 'Schowalter', 'Wiegand', 'rwilkinson@example.com', '$2y$10$EesbSnMUlBxA0tOBY87USeCrhron.0/49ryevYyV4P9A6zxT7u4Iy', 0, '2025-02-10 21:06:13', NULL, NULL, 0x4c147c06596a41bcb8a50e48da969b59),
(0x1bc1bbc87170417090bb223d56bd657d, 'Jaylen', 'Hartmann', 'Schultz', 'whoppe@example.com', '$2y$10$3NuT/L/dgNHIIwz/Nlywzeka6xTbcHi/An76dAXC2OEi9GFeM8F5m', 1, '2025-02-10 21:06:12', NULL, NULL, 0x43a419ad718d4f5d893b89829d8a2142),
(0x2044d71342ac495583db1702d9e74890, 'Micaela', 'Feil', 'Heidenreich', 'oreilly.halie@example.com', '$2y$10$GnKXkWJO1.kwuQ6/zw6Ys.j0Rcbj9.q7AaZPl26QgXgI4TFZrFDh2', 1, '2025-02-10 21:06:11', NULL, NULL, 0x4c147c06596a41bcb8a50e48da969b59),
(0x23be041054644c8fa179605442a4bd28, 'Natalia', 'Barton', 'Nolan', 'pollich.jade@example.org', '$2y$10$KA0ITJ/eK0tlnNrO4Vy2r.ZXy03EouGaMWvi/v.zHXi0TiA1144cC', 1, '2025-02-10 21:06:08', NULL, NULL, 0x43a419ad718d4f5d893b89829d8a2142),
(0x24d35335e639408d823b7300343ffec3, 'Elvie', 'McCullough', 'Klein', 'hartmann.cecile@example.com', '$2y$10$FkougrKM3Gk8nnWaW8azNeYwwQ/Nx2tBkkhot2tSpm0FQfTKcLDYK', 1, '2025-02-10 21:06:15', NULL, NULL, 0x43a419ad718d4f5d893b89829d8a2142),
(0x2886d33bb0d74e8fa133fecabf9bfddc, 'Eleonore', 'Walter', 'Gorczany', 'justus.raynor@example.net', '$2y$10$gyd9TkEumLubWkpZkQboR.0amEVQ/gulLddqYLc5mZwfa4HZN71ze', 1, '2025-02-10 21:06:10', NULL, NULL, 0x43a419ad718d4f5d893b89829d8a2142),
(0x314650f2f80b43d78bd09646036427c4, 'Nathen', 'Littel', 'Simonis', 'bkassulke@example.com', '$2y$10$mi8/K.p9m4IpwpjQ7qPC8.0YK9P2TyrSIA5mFhV0jcm621Ia6nZJO', 1, '2025-02-10 21:06:13', NULL, NULL, 0x43a419ad718d4f5d893b89829d8a2142),
(0x34fe14befaff44269a887755aad57b90, 'Juanito', 'Pérez', 'Pérez', 'jperez@fake.com', '$2y$10$drIwNAfFyQLhkqY2jPBkl.ro5h1HkBxZLp/F4BlHMeUMW9fEvJRM6', 1, '2025-02-11 02:19:32', NULL, NULL, 0x4c147c06596a41bcb8a50e48da969b59),
(0x3c981dfcdaff4d0397213da8a50e60e8, 'Haleigh', 'Rempel', 'Sauer', 'cpouros@example.com', '$2y$10$qP1yHIHnP1naEckcLpv4AuDCA8oOGXOLnOsfOI9dW4zPdc798yykG', 1, '2025-02-10 21:06:15', NULL, NULL, 0x4c147c06596a41bcb8a50e48da969b59),
(0x421de8dc10ef4b39a500aef7794eb655, 'Jovanny', 'D\'Amore', 'Schroeder', 'cgraham@example.com', '$2y$10$5tWWLnhnIClms5DcFtq5duCx3pz5ZI/zEarBgbMKWCO/fpLHpntD2', 1, '2025-02-10 21:06:14', NULL, NULL, 0x4c147c06596a41bcb8a50e48da969b59),
(0x4788f5d2934f4cbc9826a40b03324dd1, 'Joey', 'Spinka', 'Schowalter', 'serenity.walsh@example.org', '$2y$10$uopkn/9wXQOvtI5pzX5zvOAUawnyONHYUNSl66kCrHGCwY8x.gHnS', 0, '2025-02-10 21:06:14', NULL, NULL, 0x43a419ad718d4f5d893b89829d8a2142),
(0x4aef1d2f46f34ec7b589d1277c445455, 'Cordie', 'Jones', 'Simonis', 'halvorson.penelope@example.org', '$2y$10$oFlPSGV7q6LubooA7ZuyF.W..5QBIsyF7/IxuHvxbepB93fHBz8O.', 0, '2025-02-10 21:06:13', NULL, NULL, 0x43a419ad718d4f5d893b89829d8a2142),
(0x4c36e9a40f8944179b5c2379f0c270a0, 'Jaclyn', 'Simonis', 'Volkman', 'ashley.doyle@example.com', '$2y$10$Wjl6Ndh.V34N7mB6xf/E...8cxqxYKRYB9srijyBgAQ8WigsREPfq', 0, '2025-02-10 21:06:11', NULL, NULL, 0x4c147c06596a41bcb8a50e48da969b59),
(0x4c55be2bf6b24e0ba2e6062eb402a393, 'Roxanne', 'Pfannerstill', 'Aufderhar', 'xlangosh@example.net', '$2y$10$QE9p3GwYcxZ8c4zVo0rNIukjb1RaoLIF6.WbTtb5xEPxSRZy3Z9eG', 1, '2025-02-10 21:06:14', NULL, NULL, 0x4c147c06596a41bcb8a50e48da969b59),
(0x4ee0f4effb0e40da979e46b65f1d4cf9, 'Etha', 'Mosciski', 'Marks', 'hailey.graham@example.net', '$2y$10$VXFClVRdit8DlqkCuLvCSe/kui/bSybInU4NslZq.M.cOmnglU1iC', 1, '2025-02-10 21:06:08', NULL, NULL, 0x4c147c06596a41bcb8a50e48da969b59),
(0x4f09088e27d04ddd871a255abcc6595f, 'Jordi', 'Osinski', 'Tromp', 'lueilwitz.rachelle@example.org', '$2y$10$PG.4UjHG6vdsXafoTf7PJ.CZlM5jG5fjNY5eGr0g2lEZyplsGnnrS', 0, '2025-02-10 21:06:08', NULL, NULL, 0x43a419ad718d4f5d893b89829d8a2142),
(0x521a996c999747c2954f9ed4481c6728, 'Hazle', 'Kautzer', 'Brown', 'laurel27@example.org', '$2y$10$3.mBGtwYx2jpS1XNDHXlsuUuRQyq0RiW30PP5tglZaHsgOgTVqKz.', 0, '2025-02-10 21:06:12', NULL, NULL, 0x43a419ad718d4f5d893b89829d8a2142),
(0x534d250b06eb4b2fb7f8277e153a3f8b, 'Toy', 'Jakubowski', 'Hettinger', 'kyla.emard@example.net', '$2y$10$9EhG77z74z8ld1T/1TEXoOiYr8HGaNek.ZQ2hXjufK3qw12PHb.PO', 0, '2025-02-10 21:06:08', NULL, NULL, 0x43a419ad718d4f5d893b89829d8a2142),
(0x56c56893e42f4671932e68875729ddda, 'Hayden', 'Luettgen', 'Doyle', 'coleman35@example.net', '$2y$10$ASfTRxi9eGQ/gBpVkVOUTef4S6TqFj3L5Mf2KxdjxObCMWEPIY0yy', 1, '2025-02-10 21:06:10', NULL, NULL, 0x4c147c06596a41bcb8a50e48da969b59),
(0x5917425dd93a4ee2bbc9ac2a0e0ff454, 'Janne', 'Doe', '', 'janne@fake.com', '$2y$10$5P/pQ95JYnPhJmfEm/0HUug3xG3qq/97OZFkHiCWOJjL8gTtQ03/e', 1, '2025-02-10 23:13:15', NULL, NULL, 0x43a419ad718d4f5d893b89829d8a2142),
(0x5a1414bf30a446568014dc859219f5a3, 'Marco', 'Kuhn', 'Kertzmann', 'stark.ashleigh@example.net', '$2y$10$0WEX5Y/8CyVvjZ3hH1hoAOx09K74U9wUvMKfZi59HGIyuNTe.VSfO', 0, '2025-02-10 21:06:15', NULL, NULL, 0x43a419ad718d4f5d893b89829d8a2142),
(0x5ef94c00dfbf4ee59a65d0871e4018ff, 'Herman', 'Rau', 'Dickinson', 'wilford70@example.net', '$2y$10$ls6j7lVwePwb9DkxsEy9KeLbeD763WK5jHOWzHlGoKApT/y/YwK4O', 0, '2025-02-10 21:06:14', NULL, NULL, 0x4c147c06596a41bcb8a50e48da969b59),
(0x6284bb7f8eac404e8151426259f0483b, 'Alaina', 'Eichmann', 'Wehner', 'stokes.noelia@example.com', '$2y$10$GP9rzU1FyBKZqR28/HFlE.ETdyQVv1cgxS11Hd9D8PIvAf8ERczeO', 1, '2025-02-10 21:06:12', NULL, NULL, 0x4c147c06596a41bcb8a50e48da969b59),
(0x62d2501eb7bb41f69216fff64fa5c4a4, 'Camryn', 'Toy', 'Lockman', 'stanton.davin@example.net', '$2y$10$mVTh3HLYrI4XdrFluYOuaeVxZkAMLRl38PHWEo04Hrt42cy0LKOcO', 0, '2025-02-10 21:06:15', NULL, NULL, 0x43a419ad718d4f5d893b89829d8a2142),
(0x6353dd15260247fd96b7e4bc055b7b85, 'bbb', 'bbb', 'bbb', 'b@fake.com', '$2y$10$sHPFgXt/yZchQkl4sDflXeKakbIcU7kASdikVFFnqhLJYTItSzv.a', 0, '2025-02-12 23:48:36', NULL, '2025-02-12 20:49:15', 0x4c147c06596a41bcb8a50e48da969b59),
(0x6924e26e058e496885f6591e937b4cd4, 'Wilson', 'Kilback', 'Becker', 'brayan.hessel@example.com', '$2y$10$axQXDhn5/Nn.Heff1XjvEukxFJX7Zd.xY2RulDR5bWYlbWYUdo4Hy', 0, '2025-02-10 21:06:15', NULL, NULL, 0x43a419ad718d4f5d893b89829d8a2142),
(0x69b3779140854a0e9a6601bbabd82c5a, 'Janet', 'Daugherty', 'Schiller', 'donnelly.oswaldo@example.org', '$2y$10$oncJ3JGGrBHoTmA9/DzCkO8aI9ng0s1PgpmA0NuK2Zz.riQT7tA2S', 1, '2025-02-10 21:06:08', NULL, NULL, 0x4c147c06596a41bcb8a50e48da969b59),
(0x6b7c0eef58654880aa610ad4f6e19b87, 'Letha', 'Lebsack', 'Collins', 'ima.kunde@example.net', '$2y$10$Z3PxbCQrcV3i0REuDE.8.OK0OwLDPCJ04I0/33JRvquRUEubZHmLe', 0, '2025-02-10 21:06:12', NULL, NULL, 0x43a419ad718d4f5d893b89829d8a2142),
(0x6b9b41cac6f942f6b364966165b995db, 'Fanny', 'Legros', 'Wolff', 'wcole@example.com', '$2y$10$W/BBf6c7rumcHDkDnfrEJ.T12IbHzA0PIlD5NBYvcreVcJ1AmTI0e', 1, '2025-02-10 21:06:12', NULL, NULL, 0x4c147c06596a41bcb8a50e48da969b59),
(0x6f91cc31553b4367b77f59aa23054058, 'Elmer', 'Olson', 'Littel', 'lakin.cortez@example.net', '$2y$10$wUoBIJrj81jD6TLo0eQrI.W95oQDoVtZBXIwDLPBmG10u70AYHL/q', 1, '2025-02-10 21:06:10', NULL, NULL, 0x4c147c06596a41bcb8a50e48da969b59),
(0x724690e861b64b4086c9475d4592bed8, 'Jevon', 'Shields', 'Kuvalis', 'abednar@example.com', '$2y$10$wwYH.Fwcd9PWZZtmRaVp/uHZ1AMoScHxXhXPrlTAYdh0m1VOvqpXe', 0, '2025-02-10 21:06:11', NULL, NULL, 0x4c147c06596a41bcb8a50e48da969b59),
(0x733d6e7ce0314d24974ba0efd9f24d09, 'Lucy', 'Kunze', 'Leannon', 'carroll.halle@example.org', '$2y$10$olhpc4Dho9AD1u4FkRaHsuJRL.CvXmmbgGkBxNYUClBoyB9cFR.oC', 1, '2025-02-10 21:06:10', NULL, NULL, 0x43a419ad718d4f5d893b89829d8a2142),
(0x75aadd653e794fbbb4ca14b8dbb995ab, 'Dock', 'Blick', 'Casper', 'kiana.koch@example.com', '$2y$10$OLf.YYNQXCxCtZMczBq.Kejf0dJh081rd0nZOeoUp6VY2K7Gh2z6W', 0, '2025-02-10 21:06:10', NULL, NULL, 0x43a419ad718d4f5d893b89829d8a2142),
(0x7d1bd9d51e3d4039a481aad98a6b67de, 'Magnus', 'Zboncak', 'Greenfelder', 'hunter.damore@example.com', '$2y$10$yx0Obljjt9Udt5cyHuBW2.eeBwTuJL74j0FWa9hJmkQPcS./21oEm', 0, '2025-02-10 21:06:15', NULL, NULL, 0x4c147c06596a41bcb8a50e48da969b59),
(0x826df8e036a24278bb9cfaf2893699d2, 'Hershel', 'Ondricka', 'Brakus', 'deron.spencer@example.com', '$2y$10$5tq826hyXgHpSjV/uyAfnuA.aRvGPX5l/7cCsKP85D3mMgpn.pA2W', 1, '2025-02-10 21:06:11', NULL, NULL, 0x4c147c06596a41bcb8a50e48da969b59),
(0x849fa7d854da4633a4be7d502bf46702, 'Earnestine', 'Vandervort', 'Stracke', 'cristal.marvin@example.org', '$2y$10$xWS1KNhFrJ0r5XlnzW0ClOwhi3aMexR9wDUXJSw0cwcL4eAbSQ7fW', 0, '2025-02-10 21:06:10', NULL, NULL, 0x43a419ad718d4f5d893b89829d8a2142),
(0x8909da1c10fd4d89910282a6cc60bbb6, 'Paula', 'Cremin', 'Nader', 'kari.weber@example.net', '$2y$10$O.kKrnPYhpRzExZ6o5mVKuQe4/gzy2at18qP8lbWxI/9VHP3pfXVK', 1, '2025-02-10 21:06:08', NULL, NULL, 0x4c147c06596a41bcb8a50e48da969b59),
(0x8af9d9f680ec48d79055ca80e92b12c3, 'Shanie', 'Hermiston', 'Waters', 'gschroeder@example.com', '$2y$10$hzVXzdr1ikmYcVZB2Fp8k.BAq3s3Vmofz9PKPkaPCb5PpY8iHLzgi', 1, '2025-02-10 21:06:13', NULL, NULL, 0x43a419ad718d4f5d893b89829d8a2142),
(0x8d82e8894063407a9f4f9ab0f94c2f67, 'Quincy', 'Sporer', 'Bashirian', 'wiley59@example.net', '$2y$10$P02sPrmmobJEEdTg.falEOGnvXxCrPsWEIDXnyAN97g7mZONH.xtC', 1, '2025-02-10 21:06:09', NULL, NULL, 0x43a419ad718d4f5d893b89829d8a2142),
(0x8e48bfb07f124509a481543ee6db8043, 'Tyrique', 'Hayes', 'Klein', 'pamela39@example.org', '$2y$10$GrGJUKl9.1D2zy8AaqCLgu/NQX2dbiDWJ15Z7vbJkr70b3feSlwvW', 0, '2025-02-10 21:06:13', NULL, NULL, 0x43a419ad718d4f5d893b89829d8a2142),
(0x8f2c93dd6ed544e8986f7a33664fa8c7, 'Hailee', 'Buckridge', 'Reynolds', 'thompson.violet@example.com', '$2y$10$ip6HsPDxyUpcznSEWvpRNuchXTh9abUEYW3Qyb0vZoqcsj1NXvwbC', 1, '2025-02-10 21:06:15', NULL, NULL, 0x43a419ad718d4f5d893b89829d8a2142),
(0x97bd6ae12802448c9fd2adc838edb23f, 'Anahi', 'Stanton', 'Boehm', 'ddooley@example.org', '$2y$10$XT9371He2nls4l3BphKko.8ou1SE6IUM8AZK3tqJTuyeMuow6k9vK', 0, '2025-02-10 21:06:09', NULL, NULL, 0x43a419ad718d4f5d893b89829d8a2142),
(0x9a0704038f61428a8c7eb26587be00f1, 'Urban', 'Anderson', 'Bogisich', 'sconsidine@example.com', '$2y$10$6yVdIvx8.nW2yzCC8QcssO9Ya/pVA6PANNiLTaYBuCluUyDJIrQZ6', 0, '2025-02-10 21:06:11', NULL, NULL, 0x4c147c06596a41bcb8a50e48da969b59),
(0x9e412be90af84fb4ae18c22474a0221a, 'Kathlyn', 'Lubowitz', 'Lindgren', 'gdickinson@example.com', '$2y$10$tqTtYw4AL8LT2h1WTeC7EOYkDUtwqGsSYbmVjzriwScybgR3EGp2a', 0, '2025-02-10 21:06:10', NULL, NULL, 0x4c147c06596a41bcb8a50e48da969b59),
(0xa94119a32ee44c2ab93ee499b24df169, 'Ardella', 'Runolfsdottir', 'Treutel', 'kmetz@example.org', '$2y$10$LbjaSZgje7l3ecDsstSlLumIYvJ2Cxj9erRkVjnLThS/HMkxXUGFG', 1, '2025-02-10 21:06:15', NULL, NULL, 0x4c147c06596a41bcb8a50e48da969b59),
(0xac6499a979044bfaaeceb78483779d57, 'Sylvester', 'Watsica', 'Blick', 'kreiger.missouri@example.com', '$2y$10$eOZxZEAEBEonbHxpetLkvOy/0Fpv3CocBvPLyH0XK9/roe4HjPt0.', 1, '2025-02-10 21:06:14', NULL, NULL, 0x4c147c06596a41bcb8a50e48da969b59),
(0xaec6c1e994df416f8261bf00c9f118fd, 'Earnest', 'Casper', 'Koepp', 'kitty.bernhard@example.org', '$2y$10$xS7QfGLy4oIzmPbFg8UmtOdICK4KxFkm5XkN6f/Y9Jt6Cu2wuUR8S', 1, '2025-02-10 21:06:15', NULL, NULL, 0x43a419ad718d4f5d893b89829d8a2142),
(0xaffb8bbc8ff74db2a8cfade91d78420c, 'Kim', 'Grimes', 'Keeling', 'fbosco@example.com', '$2y$10$BL9yYh7qUuMoJPIt.lCfU.6lZ6AW6fB./iDEy6wOLD1fI.A1wX1uG', 1, '2025-02-10 21:06:12', NULL, NULL, 0x4c147c06596a41bcb8a50e48da969b59),
(0xb10a306d19264d41b6aa5159a85add56, 'Heidi', 'Kiehn', 'Rau', 'bryana.carter@example.org', '$2y$10$5890Pstr4jNJF0IoE0.XR./ylzRgyoVB8lpR6KhAiXOOGvxrXn/Vm', 1, '2025-02-10 21:06:09', NULL, NULL, 0x4c147c06596a41bcb8a50e48da969b59),
(0xb33c67b6f2bc40dc8d17b242fdd59749, 'Madelynn', 'Dickinson', 'Breitenberg', 'molly.willms@example.com', '$2y$10$mzbPIcUHqqRGJJkWCZ6BFef3Aqt7/UgQPg9EVBN.hEpKewOwUxbY.', 1, '2025-02-10 21:06:12', NULL, NULL, 0x4c147c06596a41bcb8a50e48da969b59),
(0xb3dfdb9f12a140feaf41017724621fab, 'Evans', 'Macejkovic', 'Russel', 'jaeden.schultz@example.org', '$2y$10$6yYWb/YlTONFO9dvEuZIgeE.UUM.kaFFGyWib/72hmpGaVD1J52me', 1, '2025-02-10 21:06:09', NULL, NULL, 0x4c147c06596a41bcb8a50e48da969b59),
(0xb4048446578b45ebb9c733afd739cf4c, 'Nella', 'Little', 'Champlin', 'karine.jenkins@example.org', '$2y$10$YKGboRyQiAL4V/IEssAWa.7k1fyodchP1ZJ9oPqq6JDzHOW.eA2cC', 1, '2025-02-10 21:06:10', NULL, NULL, 0x43a419ad718d4f5d893b89829d8a2142),
(0xb4ff5a2933d7469494a87b8891920237, 'Rogers', 'Hauck', 'Waelchi', 'kacey.king@example.com', '$2y$10$fQD2IpTC/FNFfJ7BW13ZQe9fvEuO3nIiRBXLuzo9wsT6wBx3zaktC', 0, '2025-02-10 21:06:09', NULL, NULL, 0x43a419ad718d4f5d893b89829d8a2142),
(0xb82a8fc4051b4ddea0442ca4be745eeb, 'Benny', 'Hegmann', 'Christiansen', 'rippin.tomas@example.net', '$2y$10$ZsB0vevdtnYqNWYhwMrQh.eaXPMQPlIY9.CKvS5aXC6Cdh93E7JlO', 1, '2025-02-10 21:06:15', NULL, NULL, 0x43a419ad718d4f5d893b89829d8a2142),
(0xb91f26706cc04f5f8325445620940dff, 'Garrick', 'Terry', 'Bosco', 'frank.zemlak@example.com', '$2y$10$J3OBhJlu4u7zS/GuY7UYz.iU0rnViQ4gnYIPcMTppH6p/0thsKW8a', 0, '2025-02-10 21:06:11', NULL, NULL, 0x43a419ad718d4f5d893b89829d8a2142),
(0xb972278ad099460089f90f483a869a4a, 'Amari', 'Hudson', 'West', 'owisozk@example.com', '$2y$10$2wENHrtVQ/t.Iof4J.3bU.KTtZ92CVqaJ3e52WkCa8UamJLqvHq6W', 0, '2025-02-10 21:06:12', NULL, NULL, 0x4c147c06596a41bcb8a50e48da969b59),
(0xb9a64e42c4b94a49a60c259d647734f8, 'Beryl', 'Franecki', 'Hoeger', 'showe@example.org', '$2y$10$fEqDRw3naxSqKeBQSwoHeuSI/hj4j6Q8dMXvxEbrTPfbPf3ZhE/s6', 0, '2025-02-10 21:06:12', NULL, NULL, 0x43a419ad718d4f5d893b89829d8a2142),
(0xba93246fd80c44e89d7cbf3791226014, 'Hadley', 'Pfeffer', 'Kutch', 'kozey.uriel@example.org', '$2y$10$2zD.unuaPUxWubAuoFwrW..btVF7yM7YeD9s8JsOGMVwP10/a7unq', 0, '2025-02-10 21:06:12', NULL, NULL, 0x4c147c06596a41bcb8a50e48da969b59),
(0xbba865567534420cb33b4f670247583e, 'Nickolas', 'Hodkiewicz', 'Boehm', 'alanis.hodkiewicz@example.org', '$2y$10$QntosE01y3lg3I7ogiyLSOLx5omgz91tWMGHOPqSuHFEvRgERfQs6', 0, '2025-02-10 21:06:09', NULL, NULL, 0x43a419ad718d4f5d893b89829d8a2142),
(0xbbf1e7ab15a844609ad0e64138d0d9ee, 'Westley', 'Lemke', 'Cassin', 'amalia.simonis@example.com', '$2y$10$17H4Va5awEiGQwmpCyaFsud3i/brjy2yTVkBqTWhQRGkecugyV0o6', 1, '2025-02-10 21:06:10', NULL, NULL, 0x4c147c06596a41bcb8a50e48da969b59),
(0xbc9056dec2424e0d9fa21123405f0f99, 'Leonora', 'Swaniawski', 'Miller', 'mcormier@example.com', '$2y$10$W8blElDo6mtiF4fYt7ImRe1gc4h1HNe7DfDQTNj1B3O0vjA963zlG', 0, '2025-02-10 21:06:08', NULL, NULL, 0x4c147c06596a41bcb8a50e48da969b59),
(0xbf46d756331d430fab55c25940914bf3, 'Ashlynn', 'Satterfield', 'Rolfson', 'rogahn.kane@example.org', '$2y$10$rwavE3VEtY2M4clkdq/k9uqtuGEz.WIwu2t4ibma3caOz7Echui8m', 1, '2025-02-10 21:06:09', NULL, NULL, 0x4c147c06596a41bcb8a50e48da969b59),
(0xc1c2f59a0a23406b9ec346b482fdce35, 'Maryam', 'Pfeffer', 'Schoen', 'ernser.cullen@example.com', '$2y$10$SQgLHhhdEsg/SeYLKq3HiuVO3VQB7t/Tsv8NnoGK1WZs1Bq9rvtl2', 0, '2025-02-10 21:06:13', NULL, NULL, 0x4c147c06596a41bcb8a50e48da969b59),
(0xc4d011dec09f465a8598b7e87da28f25, 'Kraig', 'Reichert', 'Powlowski', 'mcglynn.keaton@example.net', '$2y$10$gT6uU2ehD0haVR.JIR8T5.q82o4WGIuR4wjEMa.2g2pJJo8ubBgg2', 1, '2025-02-10 21:06:11', NULL, NULL, 0x43a419ad718d4f5d893b89829d8a2142),
(0xc4f072b1d58d41fd80ad0af041d66c41, 'Augusta', 'Zieme', 'Cruickshank', 'dixie15@example.com', '$2y$10$CZdFQTKvVsq3nJe5dxzsS.AlOeio03H.eijmYeXX4ewwMxrPHUZXq', 1, '2025-02-10 21:06:12', NULL, NULL, 0x4c147c06596a41bcb8a50e48da969b59),
(0xc5284f940ef242d5a72a6e33037477f2, 'Idell', 'Kessler', 'Hammes', 'bauch.ansley@example.net', '$2y$10$D8k9Y14cvzsKT7pDnmcaR.kpOi2IJh84mCaTsG1JZtqF3n3j3qgT2', 1, '2025-02-10 21:06:09', NULL, NULL, 0x43a419ad718d4f5d893b89829d8a2142),
(0xc645c0525a0e40cdac52b76fa61c5e6a, 'Vallie', 'Reinger', 'Gorczany', 'frederick.oconnell@example.org', '$2y$10$v0JpOJVuI3.BwAy6CQC2venFRg76DnlFqrjw1Cd2VtHOOFtcjLEkq', 1, '2025-02-10 21:06:12', NULL, NULL, 0x43a419ad718d4f5d893b89829d8a2142),
(0xc891ce122a084c1282aecee7780990a6, 'Zena', 'Pfeffer', 'Goodwin', 'sophie40@example.com', '$2y$10$d40UYsS0.A69QoJlLA4vMuH5mNDfYeO7hGgaYmFpZpYg3K1nEV.7W', 0, '2025-02-10 21:06:15', NULL, NULL, 0x43a419ad718d4f5d893b89829d8a2142),
(0xcb9f752b87bb467d89451b70e4e95eab, 'Lenna', 'Nitzsche', 'Wehner', 'doug46@example.net', '$2y$10$BPrXAMc.EeI1b11.ILLfber4ScdMei1xv3HEiyeLN8YkDtFm9mOOK', 1, '2025-02-10 21:06:13', NULL, NULL, 0x43a419ad718d4f5d893b89829d8a2142),
(0xd000fda1b2d84f5d96fa4553b61b1c44, 'Billie', 'Runolfsdottir', 'Hane', 'dariana.larkin@example.net', '$2y$10$LXWPGGOkIesGDlmHHvsdY.CQbHG1zdxO0p7P52gZZDgcDOFc9jx2i', 0, '2025-02-10 21:06:12', NULL, NULL, 0x43a419ad718d4f5d893b89829d8a2142),
(0xd3e7f00eb56247ad80b86b5234ae8840, 'Yvette', 'Altenwerth', 'Hudson', 'caden.abernathy@example.net', '$2y$10$QaCKER9Z5oxc.kTPBW8wBeI83kfhZr4vvK46ynBVJC3zVfZp.Lx0u', 0, '2025-02-10 21:06:14', NULL, NULL, 0x4c147c06596a41bcb8a50e48da969b59),
(0xd51d952d113e4e53a2dce7733301b1ce, 'Alejandrin', 'Okuneva', 'Haag', 'franecki.josiane@example.com', '$2y$10$6QQOlhVaHAXHZxnS7bVHp.psRAucIptRhvrH8wltl2o3SsbCO6igO', 0, '2025-02-10 21:06:13', NULL, '2025-02-11 00:19:06', 0x4c147c06596a41bcb8a50e48da969b59),
(0xd8881136f0d54fcbb283e7cedc3725b2, 'Alexandra', 'Ernser', 'Ledner', 'theron.hill@example.com', '$2y$10$nXOcXChzphrrNnGCxAWAtu42w1lc55YKlrRjOrhBfyc32ftBgCx8y', 1, '2025-02-10 21:06:09', NULL, NULL, 0x4c147c06596a41bcb8a50e48da969b59),
(0xd993b37cf12b43e9a0bc0b02822bd6a8, 'Evan', 'Will', 'Wehner', 'haven.crona@example.com', '$2y$10$7yFN2RyjqLIeW1GsclZ5A.ed.JXNbdeu24GJgbC5UnoaMEkavW2Sy', 0, '2025-02-10 21:06:13', NULL, NULL, 0x43a419ad718d4f5d893b89829d8a2142),
(0xd9df5fa733a14b88ad0c324e152c1353, 'Gavin', 'McCullough', 'Mayert', 'ward.vivienne@example.net', '$2y$10$YG.fnw.zNeHc8EMz/eVhX.u4rcDSmAFjfd.sNrWw45jg9aHarC8ju', 0, '2025-02-10 21:06:08', NULL, NULL, 0x4c147c06596a41bcb8a50e48da969b59),
(0xe1c57eedd41545c9924a8a4eb753fa69, 'Janelle', 'Kuhic', 'Stanton', 'bella87@example.org', '$2y$10$NWHcq3qGA3xsUKOGqYNKLuisjSeqNY5me7aWMDpIPUxT9S9U83RGO', 1, '2025-02-10 21:06:13', NULL, NULL, 0x43a419ad718d4f5d893b89829d8a2142),
(0xe6b5086af8b5444c9312fbf3fa1e153a, 'Nellie', 'Keeling', 'Will', 'wilderman.lamont@example.com', '$2y$10$DYwoo321gfYE5S1aRe/AOefK3wIVJCgPPovbSMnSjoWHWLQlHl6zW', 0, '2025-02-10 21:06:08', NULL, NULL, 0x4c147c06596a41bcb8a50e48da969b59),
(0xea32ea101ccc439292d010cdc6785bc0, 'Rosemarie', 'Erdman', 'Mante', 'eddie50@example.net', '$2y$10$iez07YkqIMpAfd3MUl/LBOQZWwYkZwUYBVT6kwUqzqGgJGQhjFo7a', 1, '2025-02-10 21:06:11', NULL, NULL, 0x4c147c06596a41bcb8a50e48da969b59),
(0xeb642ba6841240d998d24b1f80f575df, 'Quincy', 'Langosh', 'Kunze', 'adelbert.eichmann@example.net', '$2y$10$RXUM0OzEQHSPlhtwIvYogub8m5bFO6ZWiOLY/./315.Qyjbip1u2K', 1, '2025-02-10 21:06:13', NULL, NULL, 0x43a419ad718d4f5d893b89829d8a2142),
(0xec44609d3c2542edadb3d050559d593b, 'Teresa', 'Gutmann', 'Volkman', 'kuhic.tremaine@example.org', '$2y$10$RKrq3I6No8Z9r1pKTKxkz.jloHcq6IdHpI7uuUZIrKv9IcZa5FZKa', 1, '2025-02-10 21:06:14', NULL, NULL, 0x43a419ad718d4f5d893b89829d8a2142),
(0xf0cd002377814ad4855ef6cf07ed262e, 'Jesus', 'Rohan', 'Torphy', 'bthiel@example.org', '$2y$10$LH9A4SCUCw83RWh2yXKoSubEWENRk7cUZ0UIvm3r4tFW6eg98EQ7W', 0, '2025-02-10 21:06:14', NULL, NULL, 0x4c147c06596a41bcb8a50e48da969b59),
(0xf19eb5b16d39432982e495b7b30483fc, 'Ansel', 'Stroman', 'Kessler', 'marquardt.paula@example.net', '$2y$10$SQZPrZUdBaubCZZtbeD02u4FhqrPXBRlbwdq0F/tCSX6sPKwyU23G', 0, '2025-02-10 21:06:14', NULL, NULL, 0x43a419ad718d4f5d893b89829d8a2142),
(0xf386d20dcc7d47e58e04c1e59f81b088, 'Lyric', 'Kassulke', 'Walsh', 'lavina.labadie@example.com', '$2y$10$I5x/5dPSEQbZ8zuqeItB0eNgqWPd2F9YSuuCkxja.FsCTyNxGiYay', 0, '2025-02-10 21:06:11', NULL, NULL, 0x43a419ad718d4f5d893b89829d8a2142),
(0xf78bd8ac0a9248999d8a438858c0c104, 'Ed', 'Torp', 'Konopelski', 'yvette.wintheiser@example.org', '$2y$10$ztl.xFJjZtHR/azNWfsLBuT8XWn01tkiF8NnEKDq2AOvGK65jhg8C', 0, '2025-02-10 21:06:09', NULL, NULL, 0x43a419ad718d4f5d893b89829d8a2142),
(0xf8a762a96d0a43ddb0d2612b446d0c5e, 'Carmine', 'Prohaska', 'Gaylord', 'kulas.sasha@example.net', '$2y$10$ouuaNgR7379ZNiFu2ayceOo5yt7OkU5zF1ZA7F.AeJGSxIBhNraFC', 1, '2025-02-10 21:06:14', NULL, NULL, 0x43a419ad718d4f5d893b89829d8a2142),
(0xfbfe69a380fd4392a1b43b3ac23665ed, 'Frederique', 'Hodkiewicz', 'Glover', 'karlie73@example.com', '$2y$10$rBRZf0t4PyTMVzT2R.iPLeMuYgSeX8.srSozYtHQv4HwTsBKo8a3i', 1, '2025-02-10 21:06:10', NULL, NULL, 0x43a419ad718d4f5d893b89829d8a2142),
(0xfd39d41585e54db5ae2794310304f4a5, 'Xzavier', 'Franecki', 'Kunde', 'blarson@example.net', '$2y$10$0L/mEGEWsujJrG0QoBbTUe5C5JtLw4LEn4EG4NuyjjerVbx2w7TAa', 1, '2025-02-10 21:06:12', NULL, NULL, 0x4c147c06596a41bcb8a50e48da969b59),
(0xff297d717f5e44bca87a0a66f82286dc, 'Amos', 'Grimes', 'Mohr', 'vivienne.eichmann@example.org', '$2y$10$.E7gJ5o0tlZwFb6iX.MCdOJ87qEJU0/G41VZvWr3Sg3FRJcQGIr/.', 0, '2025-02-10 21:06:10', NULL, NULL, 0x4c147c06596a41bcb8a50e48da969b59);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `enrollments`
--
ALTER TABLE `enrollments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_enrollments_users1_idx` (`user_id`),
  ADD KEY `fk_enrollments_courses1_idx` (`course_id`);

--
-- Indices de la tabla `phinxlog`
--
ALTER TABLE `phinxlog`
  ADD PRIMARY KEY (`version`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`),
  ADD KEY `fk_users_roles_idx` (`role_id`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `enrollments`
--
ALTER TABLE `enrollments`
  ADD CONSTRAINT `fk_enrollments_courses1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_enrollments_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_users_roles` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
