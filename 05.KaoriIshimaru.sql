-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost:3306
-- 生成日時: 2021 年 4 月 01 日 08:29
-- サーバのバージョン： 5.7.32
-- PHP のバージョン: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- データベース: `gs_book_db`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_bm_table`
--

CREATE TABLE `gs_bm_table` (
  `book_id` int(12) NOT NULL,
  `id` int(12) NOT NULL,
  `user_name` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_520_ci NOT NULL,
  `book_title` varchar(64) NOT NULL,
  `book_url` text NOT NULL,
  `book_comment` text NOT NULL,
  `added` datetime NOT NULL,
  `done_flg` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `gs_bm_table`
--

INSERT INTO `gs_bm_table` (`book_id`, `id`, `user_name`, `book_title`, `book_url`, `book_comment`, `added`, `done_flg`) VALUES
(15, 1, 'caori', 'トリリオンゲーム', 'https://www.amazon.co.jp/%E3%83%88%E3%83%AA%E3%83%AA%E3%82%AA%E3%83%B3%E3%82%B2%E3%83%BC%E3%83%A0%EF%BC%88%EF%BC%91%EF%BC%89-%E3%83%93%E3%83%83%E3%82%B0%E3%82%B3%E3%83%9F%E3%83%83%E3%82%AF%E3%82%B9-%E6%B1%A0%E4%B8%8A%E9%81%BC%E4%B8%80-ebook/dp/B08YJWRJ4V/ref=sr_1_1?__mk_ja_JP=%E3%82%AB%E3%82%BF%E3%82%AB%E3%83%8A&dchild=1&keywords=%E3%83%88%E3%83%AA%E3%83%AA%E3%82%AA%E3%83%B3%E3%82%B2%E3%83%BC%E3%83%A0&qid=1617163015&s=books&sr=1-1', 'けんすうさんがオススメしてた、起業の漫画', '2021-03-31 14:20:14', 1),
(17, 1, 'caori', '確かな力が身につくJavaScript「超」入門 第2版', 'https://www.amazon.co.jp/%E7%A2%BA%E3%81%8B%E3%81%AA%E5%8A%9B%E3%81%8C%E8%BA%AB%E3%81%AB%E3%81%A4%E3%81%8FJavaScript%E3%80%8C%E8%B6%85%E3%80%8D%E5%85%A5%E9%96%80-%E7%AC%AC2%E7%89%88-%E7%8B%A9%E9%87%8E-%E7%A5%90%E6%9D%B1/dp/4815601577', '確かな力・・それは身に付けたい', '2021-03-31 14:37:51', 1),
(18, 4, 'キャオリ', 'ビジネスの未来 エコノミーにヒューマニティを取り戻す', 'https://www.amazon.co.jp/%E3%83%93%E3%82%B8%E3%83%8D%E3%82%B9%E3%81%AE%E6%9C%AA%E6%9D%A5-%E3%82%A8%E3%82%B3%E3%83%8E%E3%83%9F%E3%83%BC%E3%81%AB%E3%83%92%E3%83%A5%E3%83%BC%E3%83%9E%E3%83%8B%E3%83%86%E3%82%A3%E3%82%92%E5%8F%96%E3%82%8A%E6%88%BB%E3%81%99-%E5%B1%B1%E5%8F%A3-%E5%91%A8/dp/4833423936', 'This is why important \"Why Me?\"!!! ', '2021-03-31 14:38:32', 1),
(19, 4, 'キャオリ', 'ニュータイプの時代 新時代を生き抜く24の思考・行動様式', 'https://www.amazon.co.jp/%E3%83%8B%E3%83%A5%E3%83%BC%E3%82%BF%E3%82%A4%E3%83%97%E3%81%AE%E6%99%82%E4%BB%A3-%E6%96%B0%E6%99%82%E4%BB%A3%E3%82%92%E7%94%9F%E3%81%8D%E6%8A%9C%E3%81%8F24%E3%81%AE%E6%80%9D%E8%80%83%E3%83%BB%E8%A1%8C%E5%8B%95%E6%A7%98%E5%BC%8F-%E5%B1%B1%E5%8F%A3-%E5%91%A8/dp/447810834X/ref=pd_lpo_14_img_0/355-0029565-8503878?_encoding=UTF8&pd_rd_i=447810834X&pd_rd_r=fb73b212-6ec8-4ff7-8058-83d5e50981dd&pd_rd_w=07utm&pd_rd_wg=VEpeG&pf_rd_p=43793539-bb55-42ca-a906-e224e71aa7fd&pf_rd_r=AB6X6W5F9BC0039A65G3&psc=1&refRID=AB6X6W5F9BC0039A65G3', '山口周さんの本はいつも面白い', '2021-03-31 14:39:08', 1),
(20, 3, 'かおりん', '動かして学ぶ! Laravel開発入門', 'https://www.shoeisha.co.jp/book/detail/9784798168654', '山崎先生の新書。初学者におすすめとのことだったが、githubのコードもあって本当に良かった！', '2021-03-31 14:40:33', 1),
(21, 1, 'caori', 'ウェルビーイングの設計論-人がよりよく生きるための情報技術', 'https://www.amazon.co.jp/%E3%82%A6%E3%82%A7%E3%83%AB%E3%83%93%E3%83%BC%E3%82%A4%E3%83%B3%E3%82%B0%E3%81%AE%E8%A8%AD%E8%A8%88%E8%AB%96-%E4%BA%BA%E3%81%8C%E3%82%88%E3%82%8A%E3%82%88%E3%81%8F%E7%94%9F%E3%81%8D%E3%82%8B%E3%81%9F%E3%82%81%E3%81%AE%E6%83%85%E5%A0%B1%E6%8A%80%E8%A1%93-%E3%83%A9%E3%83%95%E3%82%A1%E3%82%A8%E3%83%AB-%E3%82%AB%E3%83%AB%E3%83%B4%E3%82%A9-%E3%83%89%E3%83%AA%E3%82%A2%E3%83%B3%E3%83%BB%E3%83%94%E3%83%BC%E3%82%BF%E3%83%BC%E3%82%BA/dp/4802510403', '読み途中。テクノロジーの進化に合わせて、人間の使い方も進歩しなくてはいけない', '2021-03-31 23:42:57', 0);

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_user_table`
--

CREATE TABLE `gs_user_table` (
  `id` int(12) NOT NULL,
  `user_name` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_520_ci NOT NULL,
  `user_id` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_pw` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `life_flg` int(11) NOT NULL,
  `indate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `gs_user_table`
--

INSERT INTO `gs_user_table` (`id`, `user_name`, `user_id`, `user_pw`, `life_flg`, `indate`) VALUES
(1, 'caori', 'caori_test', 'test', 0, '2021-03-30 00:08:12'),
(2, '香織', 'caori', 'test', 0, '2021-03-30 00:08:37'),
(3, 'かおりん', 'caorin_test', 'test', 0, '2021-03-30 00:08:59'),
(4, 'キャオリ', 'kyaori_test', 'test', 0, '2021-03-30 13:09:09');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `gs_bm_table`
--
ALTER TABLE `gs_bm_table`
  ADD PRIMARY KEY (`book_id`);

--
-- テーブルのインデックス `gs_user_table`
--
ALTER TABLE `gs_user_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `gs_bm_table`
--
ALTER TABLE `gs_bm_table`
  MODIFY `book_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- テーブルの AUTO_INCREMENT `gs_user_table`
--
ALTER TABLE `gs_user_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
