
CREATE TABLE [dbo].[KS_BARANG](
	[kode_barang] [nvarchar](50) NOT NULL,
	[nama_barang] [nvarchar](max) NOT NULL,
	[stok] [int] NOT NULL,
	[harga] [decimal](10, 2) NOT NULL
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[KS_LAPORAN]    Script Date: 5/26/2025 10:25:11 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[KS_LAPORAN](
	[id_laporan] [int] NOT NULL,
	[jenis_laporan] [nvarchar](max) NOT NULL,
	[tanggal_in] [date] NOT NULL,
	[tanggal_out] [date] NOT NULL
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[KS_PELANGGAN]    Script Date: 5/26/2025 10:25:11 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[KS_PELANGGAN](
	[kode_pelanggan] [nvarchar](50) NULL,
	[nama_pelanggan] [nvarchar](max) NULL,
	[alamat] [text] NULL,
	[no_telp] [nvarchar](50) NULL
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[KS_PEMBELIAN]    Script Date: 5/26/2025 10:25:11 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[KS_PEMBELIAN](
	[nama_pembelian] [nvarchar](max) NOT NULL,
	[kode_barang] [nvarchar](50) NOT NULL,
	[jumlah] [nvarchar](50) NOT NULL,
	[harga_satuan] [decimal](10, 2) NOT NULL,
	[total_harga] [decimal](10, 2) NOT NULL
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[KS_PENJUALAN]    Script Date: 5/26/2025 10:25:11 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[KS_PENJUALAN](
	[nama_penjualan] [int] NOT NULL,
	[kode_pelanggan] [nvarchar](50) NOT NULL,
	[kode_barang] [nvarchar](50) NOT NULL,
	[jumlah] [decimal](10, 2) NOT NULL,
	[harga_satuan] [decimal](10, 2) NOT NULL,
	[total_harga] [decimal](10, 2) NOT NULL,
	[tanggal] [date] NOT NULL
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[KS_STOK]    Script Date: 5/26/2025 10:25:11 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[KS_STOK](
	[nama_stok] [int] NOT NULL,
	[kode_barang] [nvarchar](50) NOT NULL,
	[jumlah] [int] NOT NULL,
	[tipe_barang] [nvarchar](50) NOT NULL,
	[tanggal] [date] NOT NULL
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[KS_SUPPLIER]    Script Date: 5/26/2025 10:25:11 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[KS_SUPPLIER](
	[kode_supplier] [nvarchar](50) NOT NULL,
	[nama_supplier] [nvarchar](max) NOT NULL,
	[alamat] [text] NOT NULL,
	[no_telp] [nvarchar](50) NOT NULL
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[KS_TRANSAKSI]    Script Date: 5/26/2025 10:25:11 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[KS_TRANSAKSI](
	[kode_transaksi] [nvarchar](50) NOT NULL,
	[kode_pelanggan] [nvarchar](50) NOT NULL,
	[kode_barang] [nvarchar](50) NOT NULL,
	[jumlah] [int] NOT NULL,
	[total_harga] [decimal](10, 2) NOT NULL,
	[tanggal] [date] NOT NULL
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[KS_USER]    Script Date: 5/26/2025 10:25:11 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[KS_USER](
	[id_user] [int] NOT NULL,
	[nama] [nvarchar](max) NOT NULL,
	[pass] [nvarchar](max) NOT NULL,
	[no_telp] [nvarchar](50) NOT NULL
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
USE [master]
GO
ALTER DATABASE [KASIR_SCANNER] SET  READ_WRITE 
GO
