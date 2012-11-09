<?php
/**
 * ページングクラス
 *
 */
class Pager {

    private $page = null;
    private $perPage = 10;
    private $itemData = array();
    private $startIndex = 0;
    private $endIndex = 0;
    private $totalPage = 0;

    private $pageData = array();
    private $nextPage = null;
    private $prevPage = null;


    /**
     * コンストラクタ
     *
     *
     * @param array $itemData ページに含まれるデータ
     */
    public function __construct(array $itemData){

        $this->itemData = $itemData;

        $this->initialize();
    }

    /**
     *
     * @param int $page
     */
    public function setCurrentPageNumber($page)
    {
        // 指定したページ番号が有効範囲内なら保持
        if(0 < $page && $page <= $this->totalPage){
            $this->page = $page;
            $this->initialize();
        }
        else{
            trigger_error("指定したページ番号[".$page."]は有効範囲外です。※ページ数：".$this->totalPage, E_USER_WARNING);
        }
    }

    /**
     * 1ページに含める件数を指定。
     * 指定しない場合は10です。
     *
     * @param int $per_page 1ページに含める件数
     */
    public function setPerPage($per_page)
    {
        $this->perPage = $per_page;

        $this->initialize();
    }

    /**
     * 現在のページ番号を取得
     *
     * @return int
     */
    public function getCurrentPageNumber()
    {
        return $this->page;
    }

    /**
     * 現在ページの次のページの番号を取得
     *
     * @return int
     */
    public function getNextPageNumber()
    {
        return $this->nextPage;
    }

    /**
     * 現在ページの前のページの番号を取得
     *
     * @return int
     */
    public function getPrevPageNumber()
    {
        return $this->prevPage;
    }

    /**
     * 現在のページのデータを取得
     *
     * @return array
     */
    public function getCurrentPageData()
    {
        if(!isset($this->pageData[$this->page - 1])){
            return array();
        }

        return $this->pageData[$this->page - 1];
    }

    /**
     * 現在のページの最初の件数を取得
     */
    public function getCurrentPageStartIndex()
    {
        return $this->perPage * ($this->page - 1) + 1;
    }

    /**
     * 現在のページの最後の件数を取得
     */
    public function getCurrentPageEndIndex()
    {
        $last = $this->perPage * ($this->page);
        return (count($this->itemData) < $last) ? count($this->itemData) : $last;
    }

    /**
     * データの数を取得
     *
     */
    public function getDataCount()
    {
        return count($this->itemData);
    }

    /**
     * ページの数を取得
     *
     */
    public function getTotalPageCount()
    {
        return $this->totalPage;
    }


//     /**
//      * ページングコントロール情報を連想配列で返す
//      */
//     function getControlInfo()
//     {
//         return array(
//             'page'          => $this->page,
//             'count'         => $this->allCount,
//             'prevPage'      => $this->prevPage,
//             'nextPage'      => $this->nextPage,
//             'startNumber'   => $this->getStartNumber(),
//             'endNumber'     => $this->getEndNumber(),
//             'totalPage'     => $this->totalPage
//         );
//     }


    //=======================================================
    // private function
    //=======================================================
    /**
     * 各ページのデータを生成する
     */
    private function initialize()
    {
        for ($i = 0; $i < count($this->itemData); $i++) {
            $page_no = (int)($i / $this->perPage);
            $this->pageData[$page_no][] = $this->itemData[$i];
        }

        $this->totalPage = count($this->pageData);

        if ($this->page < $this->totalPage) {
            $this->nextPage = $this->page + 1;
        }

        if ($this->page > 1) {
            $this->prevPage = $this->page - 1;
        }
    }
}

?>
