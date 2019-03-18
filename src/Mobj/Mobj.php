<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2019/3/18
 * Time: 16:22.
 */

namespace InsideAPI\Mobj;

use InsideAPI\Core\AbstractAPI;

class Mobj extends AbstractAPI
{
    const MOD_ADD = 'ins/v2/mobj/modadd'; // 添加模型

    const MOD_EDIT = 'ins/v2/mobj/modedit'; //编辑模型

    const MOD_DEL = 'ins/v2/mobj/moddel'; // 删除模型

    const MOD_LIST = 'ins/v2/mobj/modlist'; //获取模型列表

    const MOD_ATTR_TYPE = 'ins/v2/mobj/modattrtype'; // 模型属性类型-列表

    const MOD_ATTR_ADD = 'ins/v2/mobj/modattradd'; //模型属性添加

    const MOD_ATTR_EDIT = 'ins/v2/mobj/modattredit'; // 模型属性编辑

    const MOD_ATTR_LIST = 'ins/v2/mobj/modattrlist'; //模型属性列表

    const MOD_ATTR_SET_ORDER = 'ins/v2/mobj/modattrsetorder'; // 模型属性编辑 排序

    const MOD_ATTR_DEL = 'ins/v2/mobj/modattrdel'; // 模型属性删除

    const MOD_OBJ_ADD = 'ins/v2/mobj/modobjadd'; // 创建对象

    const MOD_OBJ_EDIT = 'ins/v2/mobj/modobjedit'; //编辑对象

    const MOD_OBJ_DEL = 'ins/v2/mobj/modobjdel'; //删除对象

    const MOD_OBJ_SETUP_FULL = 'ins/v2/mobj/modobjsetupfull'; //设置完整对象

    const MOD_OBJ_DEL_FULL = 'ins/v2/mobj/modobjdelfull'; // 删除完整对象

    const TRANSFER_DATA = 'ins/v2/mobj/transferdata'; // 数据加载

    /**
     * 模型添加.
     *
     *@param int       $modId      模型ID
     *@param string    $modName    模型名称
     *@param string    $modDes     模型介绍
     *
     *{"Modid":0,"ModName":"软件配置","ModDes":"应用于软件更新"}
     *
     * @return \Mayunfeng\Supports\Collection
     */
    public function modAdd(int $modId, string $modName, string $modDes)
    {
        return $this->parseJSON(static::POST, [
            self::MOD_ADD,
            [
                'Modid'    => $modId,
                'ModName'  => $modName,
                'ModDes'   => $modDes,
            ],
        ]);
    }

    /**
     * 编辑模型.
     *
     *@param int       $modId      模型ID
     *@param string    $modName    模型名称
     *@param string    $modDes     模型介绍
     *
     *{"Modid":1,"ModName":"软件配置","ModDes":"应用于软件更新"}
     *
     * @return \Mayunfeng\Supports\Collection
     */
    public function modEdit(int $modId, string $modName, string $modDes)
    {
        return $this->parseJSON(static::POST, [
            self::MOD_EDIT,
            [
                'Modid'    => $modId,
                'ModName'  => $modName,
                'ModDes'   => $modDes,
            ],
        ]);
    }

    /**
     * 删除模型.
     *
     *@param int       $modId      模型ID
     *
     *{"Modid":1}
     *
     * @return \Mayunfeng\Supports\Collection
     */
    public function modDel(int $modId)
    {
        return $this->parseJSON(static::POST, [
            self::MOD_DEL,
            [
                'Modid'  => $modId,
            ],
        ]);
    }

    /**
     * 获取模型列表.
     *
     *@param   string       $search
     *
     *{"search":"小鹿"}
     *
     * @return \Mayunfeng\Supports\Collection
     */
    public function modList(string $search = '小鹿')
    {
        return $this->parseJSON(static::POST, [
            self::MOD_LIST,
            [
                'search'  => $search,
            ],
        ]);
    }

    /**
     * 模型属性类型-列表.
     *
     *@param int        $modId         模型ID
     *@param string     $attrName      属性名称中文描述
     *@param string     $attribute     属性
     *@param string     $attrType      属性类型
     *@param string     $attrValue     属性值
     *@param int        $attrOrder     排序
     *
     * @return \Mayunfeng\Supports\Collection
     */
    public function modAttrType(int $modId, string $attrName, string $attribute, string $attrType, string $attrValue, int $attrOrder)
    {
        return $this->parseJSON(static::POST, [
            self::MOD_ATTR_TYPE,
            [
                'Modid '     => $modId,
                'AttrName '  => $attrName,
                'Attribute'  => $attribute,
                'AttrType '  => $attrType,
                'AttrValue'  => $attrValue,
                'AttrOrder'  => $attrOrder,

            ],
        ]);
    }

    /**
     * 模型属性添加.
     *
     *@param int        $modId         模型ID
     *@param string     $attrName      属性名称中文描述
     *@param string     $attribute     属性
     *@param string     $attrType      属性类型
     *@param string     $attrValue     属性值
     *@param int        $attrOrder     排序
     *
     * {"Modid":1,"AttrName":"文本创","Attribute":"CText","AttrType":"text","AttrValue":0,"AttrOrder":1}
     *
     * @return \Mayunfeng\Supports\Collection
     */
    public function modAttrAdd(int $modId, string $attrName, string $attribute, string $attrType, string $attrValue, int $attrOrder)
    {
        return $this->parseJSON(static::POST, [
            self::MOD_ATTR_ADD,
            [
                'Modid '     => $modId,
                'AttrName '  => $attrName,
                'Attribute'  => $attribute,
                'AttrType '  => $attrType,
                'AttrValue'  => $attrValue,
                'AttrOrder'  => $attrOrder,

            ],
        ]);
    }

    /**
     * 模型属性编辑.
     *
     *@param int        $id            递增ID
     *@param int        $modId         模型ID
     *@param string     $attrName      属性名称中文描述
     *@param string     $attribute     属性
     *@param string     $attrType      属性类型
     *@param string     $attrValue     属性值
     *@param int        $attrOrder     排序
     *
     *{"Id":1,"Modid":1,"Attribute":"CBool","AttrName":"布尔值","AttrType":"bool","AttrValue":0,"AttrOrder":1}
     *
     * @return \Mayunfeng\Supports\Collection
     */
    public function modAttrEdit(int $id, int $modId, string $attrName, string $attribute, string $attrType, string $attrValue, int $attrOrder)
    {
        return $this->parseJSON(static::POST, [
            self::MOD_ATTR_EDIT,
            [
                'Id '        => $id,
                'Modid '     => $modId,
                'AttrName '  => $attrName,
                'Attribute'  => $attribute,
                'AttrType '  => $attrType,
                'AttrValue'  => $attrValue,
                'AttrOrder'  => $attrOrder,

            ],
        ]);
    }

    /**
     * 模型属性列表.
     *
     *@param int        $modId         模型ID
     *
     * @return \Mayunfeng\Supports\Collection
     */
    public function modAttrList(int $modId)
    {
        return $this->parseJSON(static::POST, [
            self::MOD_ATTR_LIST,
            [
                'Modid '     => $modId,
            ],
        ]);
    }

    /**
     * 模型属性编辑 排序.
     *
     *@param int        $id            递增ID
     *@param int        $attrOrder     排序
     *
     * @return \Mayunfeng\Supports\Collection
     */
    public function modAttrSetOrder(int $id, int $attrOrder)
    {
        return $this->parseJSON(static::POST, [
            self::MOD_ATTR_SET_ORDER,
            [
                'Id '        => $id,
                'AttrOrder'  => $attrOrder,
            ],
        ]);
    }

    /**
     * 模型属性删除.
     *
     *@param int        $id            递增ID
     *
     * @return \Mayunfeng\Supports\Collection
     */
    public function modAttrDel(int $id)
    {
        return $this->parseJSON(static::POST, [
            self::MOD_ATTR_DEL,
            [
                'Id' => $id,
            ],
        ]);
    }

    /**
     * 创建对象
     *
     *@param int       $modid      模型ID
     *@param string    $objName    对象名称
     *
     * @return \Mayunfeng\Supports\Collection
     */
    public function modObjAdd(int $modid, string $objName)
    {
        return $this->parseJSON(static::POST, [
            self::MOD_OBJ_ADD,
            [
                'Modid'    => $modid,
                'ObjName'  => $objName,
            ],
        ]);
    }

    /**
     * 编辑对象
     *
     *@param int       $modid      模型ID
     *@param string    $objName    对象名称
     *
     * @return \Mayunfeng\Supports\Collection
     */
    public function modObjEdit(int $modid, string $objName)
    {
        return $this->parseJSON(static::POST, [
            self::MOD_OBJ_EDIT,
            [
                'Modid'    => $modid,
                'ObjName'  => $objName,
            ],
        ]);
    }

    /**
     * 删除对象
     *
     *@param int       $objId     对象ID
     *
     * @return \Mayunfeng\Supports\Collection
     */
    public function modObjDel(int $objId)
    {
        return $this->parseJSON(static::POST, [
            self::MOD_OBJ_DEL,
            [
                'ObjId'  => $objId,
            ],
        ]);
    }

    /**
     * 设置完整对象
     *
     *@param int       $objId        对象ID
     *@param int       $modId        模型ID
     *@param string    $objName      对象名称
     *@param int       $objCode      对象编码
     *@param array     $attrs        对象属性集合
     *{"Objid":3,"Modid":1,"ObjName":"对象名称","Attrs":{"CBool":true,"Clong":14,"CString":"wodestring","CText":"text测试"}}
     *
     * @return \Mayunfeng\Supports\Collection
     */
    public function modObjSetupFull(int $objId, int $modId, string $objName, array $attrs, string $objCode = '')
    {
        return $this->parseJSON(static::POST, [
            self::MOD_OBJ_SETUP_FULL,
            [
                'Objid'     => $objId,
                'Modid '    => $modId,
                'ObjName '  => $objName,
                'ObjCode '  => $objCode,
                'Attrs '    => $attrs,
            ],
        ]);
    }

    /**
     *  删除完整对象
     *
     *@param int       $objId     对象ID
     *
     * @return \Mayunfeng\Supports\Collection
     */
    public function modObjDelFull(int $objId)
    {
        return $this->parseJSON(static::POST, [
            self::MOD_OBJ_DEL_FULL,
            [
                'ObjId'  => $objId,
            ],
        ]);
    }

    /**
     *  数据加载.
     *
     * @param array $params
     *
     * @return \Mayunfeng\Supports\Collection
     */
    public function transferData($params = [])
    {
        return $this->parseJSON(static::POST, [self::TRANSFER_DATA, $params]);
    }
}
