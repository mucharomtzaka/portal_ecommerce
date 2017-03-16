<?php
echo '<?xml version="1.0" encoding="utf-8"?>' . "\n";
?>
<rss version="2.0"
xmlns:dc="http://purl.org/dc/elements/1.1/"
xmlns:sy="http://purl.org/rss/1.0/modules/syndication/"
xmlns:admin="http://webns.net/mvcb/"
xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
xmlns:media="http://search.yahoo.com/mrss/"
xmlns:content="http://purl.org/rss/1.0/modules/content/">
<channel>
    <title><?php echo $feed_name; ?></title>
    <link><?php echo $feed_url; ?></link>
    <description><?php echo $page_description; ?></description>
    <dc:language><?php echo $page_language; ?></dc:language>
    <dc:creator><?php echo $creator_email; ?></dc:creator>
    <image>
      <url><?php echo base_url('doc/images/favicon/favicon.png');?></url>
    </image>    
    <dc:rights>Copyright <?php echo gmdate("Y", time()); ?></dc:rights>
    <admin:generatorAgent rdf:resource="<?php echo base_url();?>" />
    <news>
    <?php foreach($berita_terbaru as $row):?>
      <?php if($row['status'] == 1):?>
      <item>
        <title><?php echo $row['title']; ?></title>
        <image>
           <a href="<?php echo base_url(); ?>welcome/viewpage/<?=$row['category']?>/<?=$row['slug']?>">
           <img src="<?php echo base_url(); ?>doc/images/blog/<?=$row['img_header']?>" alt="<?=$row['title']?>"  width="100px" height="100px"/>
                                     </a>
        </image>
        <link><a href="<?php echo base_url(); ?>welcome/viewpage/<?=$row['category']?>/<?=$row['slug']?>"><?=$row['title']?>"><?=$row['title']?></a></link>
        <guid><?php echo base_url(); ?>welcome/viewpage/<?=$row['category']?>/<?=$row['slug']?>"><?=$row['title']?></guid>
        <pubDate><?php echo date('l, F d, Y h:i A', strtotime($row['date']));?></pubDate>
        <description>
          <![CDATA[
            <?=character_limiter($isi_artikel,100) ?>
          ]]>
        </description>
      </item>
    <?php endif;?>
    <?php endforeach; ?>
    </news>
    <pages>
    <?php foreach($halaman as $page):?>
      <item>
        <url> <h6><a href="<?php echo base_url('welcome/getpages/'.$page->id.'/'.$page->slug.'');?>"><i class="fa fa-link bg-blue"></i><?php echo $page->title;?></a></h6></url>
        
      </item>
      <?php endforeach; ?>
      <more><a class="btn btn-primary btn-xs" href="<?php echo base_url(); ?>welcome/gethalaman">Read more</a></more>
    </pages>
    <product>
        <?php foreach($product_data as $t):?>
          <?php if($t->status =='1'):?>
          <item>
          <title>
            <?php echo $t->produk ?>
          </title>
          <image>
            <img src="<?php echo base_url('doc/images/produk')?>/<?php echo $t->images ?>" alt="<?php echo $t->produk ?>">
          </image>
          <description>
            <?php echo character_limiter($t->deskripsi_produk,10);?>
          </description>
          <url>
            <a class="btn btn-primary btn-xs" href="<?php echo base_url(); ?>welcome/detail_produk/<?php echo $t->group_product;?>/<?php echo $t->produk;?>">Read more</a>
          </url>
          </item>
        <?php endif;?>
        <?php endforeach;?>
    </product>
    <menus>
      <?php foreach($menu as $rows):?>
      <item>
       <link><a href="<?php echo base_url();?>/<?php echo $rows['url'];?>"><?php echo $rows['menu_item_name'];?></a></link>
      </item>
    <?php endforeach;?>
    </menus>
  </channel>
</rss>